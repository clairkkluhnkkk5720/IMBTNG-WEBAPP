import base64

from django.conf import settings
from django.contrib import messages
from django.contrib.auth import get_user_model
from django.contrib.auth.views import LogoutView
from django.contrib.sites.shortcuts import get_current_site
from django.core.mail import send_mail
from django.shortcuts import redirect
from django.template.loader import render_to_string
from django.urls import reverse_lazy
from django.utils import timezone
from django.utils.encoding import force_bytes, force_text
from django.utils.translation import ugettext_lazy as _
from django.utils.http import urlsafe_base64_encode, urlsafe_base64_decode
from django.views import generic
from django.db import transaction

from apps.accounts.forms import RegistrationForm
from apps.common.views import (
    BootstrapFormViewMixin, AuthenticatedRedirectMixin
)
from apps.users.utils import account_activation_token

UserModel = get_user_model()


class SignUpView(BootstrapFormViewMixin, AuthenticatedRedirectMixin,
                 generic.FormView):
    template_name = 'registration/register.html'
    registration_template_name = 'registration/confirm_email.html'
    form_class = RegistrationForm
    success_url = reverse_lazy('core:index')

    @transaction.atomic
    def form_valid(self, form):
        user = form.save()
        form.account_form.save(user=user)
        self.send_confirmation_email(user)
        self.process_referral(user)
        return super(SignUpView, self).form_valid(form)

    def process_referral(self, referral_user):
        user_id = self.request.COOKIES.get(settings.REFERRAL_COOKIE_NAME)
        if user_id:
            value = force_text(urlsafe_base64_decode(user_id))
            queryset = UserModel.objects.filter(pk=value)
            if queryset.exists():
                user = queryset.get()
                user.referral_records.create(referral=referral_user)

    def send_confirmation_email(self, user):
        current_site = get_current_site(self.request)
        mail_subject = 'Activate your account'
        message = render_to_string(self.registration_template_name, {
            'user': user,
            'domain': current_site.domain,
            'uid': urlsafe_base64_encode(force_bytes(user.pk)).decode(),
            'token': account_activation_token.make_token(user),
        })
        messages.success(
            self.request, _('We sent you email with confirmation link')
        )
        send_mail(mail_subject, message, settings.DEFAULT_FROM_EMAIL,
                  [user.email])


class ConfirmEmailView(BootstrapFormViewMixin, AuthenticatedRedirectMixin,
                       generic.View):
    template_name = 'registration/register.html'
    registration_template_name = 'registration/confirm_email.html'
    form_class = RegistrationForm
    success_url = reverse_lazy('core:index')

    @transaction.atomic
    def get(self, request, uid_str, token):
        try:
            uid = force_text(urlsafe_base64_decode(uid_str))
            user = UserModel.objects.get(pk=uid)
        except(TypeError, ValueError, OverflowError, UserModel.DoesNotExist):
            user = None
        if user is not None and account_activation_token.check_token(user,
                                                                     token):
            user.is_active = True
            user.save()
            message_text = _('Your email successfully confirmed. '
                             'You may login now.')
            messages.success(request, message_text)
            return redirect('login')

        message_text = _('Activation link is invalid')
        messages.success(request, message_text)
        return redirect('core:index')


class SignOutView(LogoutView):

    def get_next_page(self):
        return settings.LOGIN_URL


class ReferralView(generic.View):

    def get(self, request, *args, **kwargs):
        response = redirect('users:signup')
        if request.user.is_authenticated:
            return response
        if UserModel.objects.filter(pk=kwargs['pk']).exists():
            value = urlsafe_base64_encode(force_bytes(kwargs['pk'])).decode()
            response.set_cookie(
                settings.REFERRAL_COOKIE_NAME, value,
                expires=timezone.now() + timezone.timedelta(days=30)
            )
        return response
