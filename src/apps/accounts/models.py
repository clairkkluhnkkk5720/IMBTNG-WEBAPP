from django.conf import settings
from django.db import models
from django.utils.translation import ugettext_lazy as _

from apps.common.models import TimeStampedModel


class Account(models.Model):
    user = models.OneToOneField(settings.AUTH_USER_MODEL,
                                on_delete=models.PROTECT,
                                related_name='account')
    username = models.SlugField(_('username'), unique=True)
    wallet = models.CharField(_('wallet'), unique=True, max_length=255)
    deposit = models.DecimalField(_('deposit'), decimal_places=2,
                                  max_digits=15)

    def get_deposit_value(self):
        value = self.get_risk_value() + self.get_available_value()
        return value

    def get_risk_value(self):
        return float(self.user.bets.filter(status=None).aggregate(
            total_amount=models.Sum('amount'))['total_amount'] or 0)

    def get_available_value(self):
        return float(self.deposit)  # settings.DEPOSIT_COEFFICIENT

    def __str__(self):
        return self.username

    class Meta:
        verbose_name = _('account')
        verbose_name_plural = _('accounts')
