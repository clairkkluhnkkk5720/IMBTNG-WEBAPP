# result_backend = 'django-db'
import os
from datetime import timedelta

broker_url = 'redis://{host}:{port}/{db}'.format(
    host=os.getenv('REDIS_HOST', 'redis'),
    port=6379,
    db=1,
)
redbeat_redis_url = 'redis://{host}:{port}/{db}'.format(
    host=os.getenv('REDIS_HOST', 'redis'),
    port=6379,
    db=1,
)

timezone = 'UTC'
accept_content = ['json', 'application/text']
broker_transport_options = {'visibility_timeout': 2 * 60 * 60}

beat_schedule = {
    'data_feeds_parser': {
        'task': 'apps.core.tasks.data_feeds_loader',
        'schedule': timedelta(hours=1),
    },
}
