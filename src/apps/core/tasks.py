import os
import uuid

import requests
from celery import shared_task
from django.utils.text import slugify

from apps.core.parser import FootballDataFeed
from apps.core.models import EventCategory, Event, Team


@shared_task()
def data_feeds_loader():
    """
    Fetch data from data feeds.
    """

    data_feeds_parsers = [
        FootballDataFeed()
    ]
    for parser in data_feeds_parsers:
        for item in parser.fetch_page():
            event_name = slugify(''.join(
                [item['name'], str(item['starts_at'])]
            ))
            category, _ = EventCategory.objects.get_or_create(
                name=item['category'])
            obj, _ = Event.objects.get_or_create(
                name=item['name'],
                starts_at=item['starts_at'],
                defaults={
                    'category_id': category.id,
                    'name': item['name'],
                    'slug': event_name,
                })
            for team_data in item['teams']:
                team, _ = Team.objects.get_or_create(
                    name=team_data['name'],
                    slug=slugify('-'.join(
                        [team_data['name'], str(obj.category_id)]
                    ))
                )
                obj.teams.add(team)


@shared_task()
def upload_event_file_from_server(event_id):
    """
    Upload event image from entered URL.

    :param event_id: int Event id
    :return: str
    """
    event = Event.objects.get(pk=event_id)
    remote_image_url = event.logo_url
    r = requests.get(remote_image_url, stream=True)
    if r.status_code == 200:
        content_type = r.headers.get('Content-Type')
        _, _, ext = content_type.partition('/')
        unique_name = str(uuid.uuid4())
        file_name = os.path.join('uploads', '{uuid}.{ext}'.format(
            ext=ext, uuid=unique_name))
        r.raw.decode_content = True
        event.logo.save(file_name, r.raw)
        return file_name
