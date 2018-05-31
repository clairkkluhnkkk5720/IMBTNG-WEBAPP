import stripe

from django.conf import settings
from django.contrib import messages
from django.contrib.auth.mixins import LoginRequiredMixin
from django.db import transaction
from django.http import HttpResponseRedirect
from django.urls import reverse
from django.views import generic
from django.utils.translation import ugettext_lazy as _

from apps.charges import models
from apps.charges.forms import ChargeForm
from apps.common.views import UserProfileRequiredMixin


class ChargeCreateView(UserProfileRequiredMixin, LoginRequiredMixin,
                       generic.CreateView):
    template_name = 'charges/charge-form.html'
    model = models.Charge
    form_class = ChargeForm
    errors = {
        'customer_error': _('Customer error: %s'),
        'charge_error': _('Charge error: %s. You charge id: #%s')
    }

    def get_success_url(self):
        return reverse('charges:charge-status')

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['stripe_api_key'] = settings.STRIPE_PUBLIC_KEY
        return context

    @transaction.atomic
    def form_valid(self, form):
        user = self.request.user
        c_instance = None
        bind_new_card = True
        try:
            c_instance = user.customer  # type: models.Customer
            customer = stripe.Customer.retrieve(
                c_instance.stripe_id,
                api_key=settings.STRIPE_SECRET_KEY,
            )
        except (models.Customer.DoesNotExist, stripe.StripeError) as e:
            if isinstance(e, stripe.StripeError) and e.http_status != 404:
                # redirect on payment error page if customer exists
                messages.error(self.request,
                               self.errors['customer_error'] % e.http_body)
                return HttpResponseRedirect(self.get_success_url())
            try:
                # create customer on stripe
                customer = stripe.Customer.create(
                    api_key=settings.STRIPE_SECRET_KEY,
                    email=user.email,
                    source=form.cleaned_data['stripe_token']
                )
                bind_new_card = False
            except stripe.StripeError as e:
                # redirect on payment error page if customer was not created
                messages.error(self.request,
                               self.errors['customer_error'] % e.http_body)
                return HttpResponseRedirect(self.get_success_url())
            else:
                if not c_instance:
                    # create customer in our database
                    models.Customer.objects.create(
                        stripe_id=customer.stripe_id, user=user
                    )
                else:
                    # bind stripe id to customer
                    c_instance.stripe_id = customer.stripe_id
                    c_instance.save(update_fields=['stripe_id', 'updated_at'])

        if bind_new_card:
            # update customer source card
            customer.source = form.cleaned_data['stripe_token']
            try:
                customer.save()
            except stripe.StripeError as e:
                # redirect on payment error page if customer was not updated
                messages.error(self.request,
                               self.errors['customer_error'] % e.http_body)
                return HttpResponseRedirect(self.get_success_url())

        # create charge into database
        charge_instance = user.charges.create(
            amount=form.cleaned_data['amount'],
        )  # type: models.Charge

        # create charge on the stripe service
        try:
            charge = stripe.Charge.create(
                api_key=settings.STRIPE_SECRET_KEY,
                amount=charge_instance.amount * 100,
                currency=settings.STRIPE_CURRENCY,
                customer=customer.stripe_id
            )
        except stripe.StripeError as e:
            message = _('Charge error: %s') % str(e)
            charge_instance.process_fail(str(message))
            messages.error(self.request, message)
            return HttpResponseRedirect(self.get_success_url())
        else:
            charge_id = charge.stripe_id
            charge_instance.process_success(charge_id)
            messages.error(self.request, _('Your charge was successfully '
                                           'received'))
        return HttpResponseRedirect(self.get_success_url())


class ChargeStatusView(UserProfileRequiredMixin, LoginRequiredMixin,
                       generic.TemplateView):
    template_name = 'charges/charge-status.html'
