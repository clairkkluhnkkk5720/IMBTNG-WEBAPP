from django.utils.translation import ugettext_lazy as _
from django.apps import AppConfig


class ChargeConfig(AppConfig):
    name = 'apps.charges'
    verbose_name = _('charges')
