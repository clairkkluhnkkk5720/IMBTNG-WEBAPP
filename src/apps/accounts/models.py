from django.conf import settings
from django.db import models
from django.utils.translation import ugettext_lazy as _


class Account(models.Model):
    user = models.OneToOneField(settings.AUTH_USER_MODEL,
                                on_delete=models.PROTECT,
                                related_name='account')
    username = models.SlugField(_('username'), unique=True)
    wallet = models.CharField(_('wallet'), unique=True, max_length=255)

    def __str__(self):
        return self.username

    class Meta:
        verbose_name = _('account')
        verbose_name_plural = _('accounts')
