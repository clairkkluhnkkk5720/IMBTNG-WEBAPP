from django import forms

from apps.charges.models import Charge


class ChargeForm(forms.ModelForm):
    stripe_token = forms.CharField(widget=forms.HiddenInput())

    def clean_amount(self):
        return self.cleaned_data['amount'] * 100

    class Meta:
        model = Charge
        fields = ('amount', 'stripe_token')
