from django import forms
from django.contrib.auth import get_user_model
from django.contrib.auth.forms import UserCreationForm, UsernameField
from django.core.exceptions import ValidationError
from django.utils.translation import ugettext_lazy as _

from apps.accounts.models import Account

UserModel = get_user_model()


class AccountForm(forms.ModelForm):
    class Meta:
        model = Account
        fields = ('username', 'wallet')


class AccountCreateForm(AccountForm):

    def save(self, user, commit=True):
        obj = super().save(commit=False)
        obj.user = user
        obj.save()
        return obj


class RegistrationForm(UserCreationForm):
    wallet = forms.URLField(label=_('BTC Wallet Address'))
    username = UsernameField(label=_('username'))
    first_name = forms.CharField(label=_('first name'))
    last_name = forms.CharField(label=_('last name'))

    def clean(self):
        attrs = self.cleaned_data
        self.account_form = AccountCreateForm(data=attrs)
        if not self.account_form.is_valid():
            raise ValidationError(self.account_form.errors)
        return self.cleaned_data

    def save(self, commit=True):
        obj = super().save(commit=False)
        obj.set_password(self.cleaned_data['password1'])
        obj.is_active = False
        obj.save()
        return obj

    class Meta:
        model = UserModel
        fields = (
            'email', 'phone', 'first_name', 'last_name', 'username', 'wallet',
            'password1', 'password2'
        )


class UpdateAccountForm(forms.ModelForm):
    wallet = forms.URLField(label=_('BTC Wallet Address'))
    username = UsernameField(label=_('Username'))
    first_name = forms.CharField(label=_('First name'))
    last_name = forms.CharField(label=_('Last name'))

    def clean(self):
        attrs = self.cleaned_data
        self.account_form = AccountForm(data=attrs,
                                        instance=self.instance.account)
        if not self.account_form.is_valid():
            raise ValidationError(self.account_form.errors)
        return self.cleaned_data

    def save(self, commit=True):
        super().save(commit=commit)
        self.account_form.save()
        return self.instance

    class Meta:
        model = UserModel
        fields = (
            'email', 'first_name', 'last_name', 'username', 'phone',
            'wallet', 'avatar'
        )
