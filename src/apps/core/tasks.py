from celery_app import app

from apps.core.parser import FootballDataFeed
from apps.core.models import Game


@app.task()
def data_feeds_loader():
    data_feeds_parsers = [
        FootballDataFeed()
    ]
    for parser in data_feeds_parsers:
        for item in parser.fetch_page():
            obj, _ = Game.objects.get_or_create(
                service_id=item['service_id'],
                defaults={
                    'starts_at': item['starts_at'],
                    'name': item['name']
                })
            for team_data in item['teams']:
                pass
