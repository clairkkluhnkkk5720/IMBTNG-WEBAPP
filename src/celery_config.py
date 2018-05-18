# result_backend = 'django-db'

broker_url = 'redis://localhost:{port}/{db}'.format(
    port=6379,
    db=1,
)
redbeat_redis_url = 'redis://localhost:{port}/{db}'.format(
    port=6379,
    db=1,
)

timezone = "Europe/Moscow"
accept_content = ['json', 'application/text']
broker_transport_options = {'visibility_timeout': 2 * 60 * 60}
