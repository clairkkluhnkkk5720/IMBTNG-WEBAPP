from django.contrib.auth.mixins import LoginRequiredMixin
from django.urls import reverse_lazy
from django.views import generic

from apps.accounts.forms import UpdateAccountForm
from apps.common.views import UserProfileRequiredMixin


class ProfileUpdateView(UserProfileRequiredMixin, LoginRequiredMixin,
                        generic.UpdateView):
    template_name = 'core/profile-edit.html'
    form_class = UpdateAccountForm
    success_url = reverse_lazy('accounts:detail')

    def get_initial(self):
        account = self.request.user.account
        return {
            'wallet': account.wallet,
            'username': account.username,
        }

    def get_object(self, queryset=None):
        return self.request.user


class ProfileView(UserProfileRequiredMixin, LoginRequiredMixin,
                  generic.DetailView):
    template_name = 'core/profile.html'

    def get_object(self, queryset=None):
        return self.request.user
