import celery_app
from django.db import transaction


def post_save_event(**kwargs):
    if not kwargs['instance']._state.adding:
        obj = kwargs['sender'].objects.get(pk=kwargs['instance'].pk)
        upload = obj.logo_url != kwargs['instance'].logo_url
    else:
        upload = True

    if upload and kwargs['instance'].logo_url:
        transaction.on_commit(lambda: celery_app.app.send_task(
            'apps.core.tasks.upload_event_file_from_server', [
                kwargs['instance'].pk
            ]
        ))
