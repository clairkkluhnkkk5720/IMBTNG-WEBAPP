from __future__ import absolute_import, unicode_literals
import os
from celery import Celery
from django.conf import settings

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'settings')
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

app = Celery('celery_app')
app.config_from_object('celery_config')
app.autodiscover_tasks(lambda: settings.INSTALLED_APPS)
