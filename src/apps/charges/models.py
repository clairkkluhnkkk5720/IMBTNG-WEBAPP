from django.conf import settings
from django.db import models
from django.utils.translation import ugettext_lazy as _
from model_utils import Choices

from apps.common.models import TimeStampedModel


class Customer(TimeStampedModel):
    stripe_id = models.CharField(_('stripe customer id'), max_length=256)
    user = models.OneToOneField(settings.AUTH_USER_MODEL,
                                on_delete=models.PROTECT,
                                related_name='customer')

    class Meta:
        verbose_name = _('Stripe customer')
        verbose_name_plural = _('Stripe customers')


class Charge(TimeStampedModel):
    STATUS_CHOICES = Choices(
        ('CREATED', _('Created')),
        ('SUCCESS', _('Success')),
        ('FAIL', _('Fail')),
    )
    stripe_id = models.CharField(_('Stripe id'), max_length=512, default='')
    status = models.CharField(_('Status'), max_length=8,
                              default=STATUS_CHOICES.CREATED,
                              choices=STATUS_CHOICES)
    error = models.TextField(_('error'), default='', blank=True)

    amount = models.DecimalField(_('amount'), max_digits=20, decimal_places=2)
    user = models.ForeignKey(settings.AUTH_USER_MODEL, related_name='charges',
                             on_delete=models.PROTECT)

    def process_success(self, stripe_id):
        """ Would be used on successed payments. """
        assert stripe_id, _('Stripe id should not be null')
        # stripe status/id binding
        self.status = self.STATUS_CHOICES.SUCCESS
        self.stripe_id = stripe_id
        # account deposit binding
        account = self.user.account  # type: Account
        account.deposit = models.F('deposit') + self.amount
        account.save(update_fields=['deposit'])
        self.save()

    def process_fail(self, error_message):
        """ Would be used on failed payments. """
        # stripe status/error binding
        self.status = self.STATUS_CHOICES.FAIL
        self.error = error_message
        self.save()

    class Meta:
        verbose_name = _('payment record')
        verbose_name_plural = _('payment records')
