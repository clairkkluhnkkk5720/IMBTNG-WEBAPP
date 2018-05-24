from django.apps import AppConfig
from django.db.models.signals import pre_save

from apps.core.signal_handlers import post_save_event


class CoreConfig(AppConfig):
    name = 'apps.core'

    def ready(self):
        pre_save.connect(post_save_event, sender=self.models['event'])
