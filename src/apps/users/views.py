from django.conf import settings
from django.contrib.auth.views import LoginView, LogoutView
from django.urls import reverse_lazy
from django.views import generic
from django.db import transaction

from apps.accounts.forms import RegistrationForm
from apps.common.views import BootstrapFormViewMixin


class SignUpView(BootstrapFormViewMixin, generic.FormView):
    template_name = 'registration/register.html'
    form_class = RegistrationForm
    success_url = reverse_lazy('core:index')

    @transaction.atomic
    def form_valid(self, form):
        user = form.save()
        form.account_form.save(user=user)
        return super(SignUpView, self).form_valid(form)


class SignInView(BootstrapFormViewMixin, LoginView):

    def get_success_url(self):
        return settings.LOGIN_REDIRECT_URL


class SignOutView(LogoutView):

    def get_next_page(self):
        return settings.LOGIN_URL
