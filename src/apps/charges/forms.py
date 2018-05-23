from django import forms

from apps.charges.models import Charge


class ChargeForm(forms.ModelForm):
    stripe_token = forms.CharField(widget=forms.HiddenInput())

    class Meta:
        model = Charge
        fields = ('amount', 'stripe_token')
