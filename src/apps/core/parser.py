from datetime import datetime

import requests
import json

from django.conf import settings


class BaseParser(object):
    endpoint_url = None
    endpoint_domain = None
    headers = None
    service_id = None

    def fetch_page(self, page_number: int = 0):
        response = requests.get(self.endpoint_url, params={
            'page': page_number}, headers=self.headers)
        data = self.parse_response(response)
        for item in data:
            yield self.process_item(item)

    def fetch_categories(self):
        return []

    def parse_response(self, response):
        return response.json()

    def process_item(self, item: dict):
        return item


class FootballDataFeed(BaseParser):
    endpoint_url = 'https://www.football-data.org/v1/fixtures?timeFrame=n30'
    headers = {'X-Response-Control': 'minified'}
    service_id = 'football-data'

    def fetch_categories(self):
        return [
            {'name': 'Football'}
        ]

    def parse_response(self, response):
        data = response.json()
        return data['fixtures']

    def process_item(self, data: dict):
        competition_link = 'http://api.football-data.org/v1/competitions/{}'\
            .format(data['competitionId'])

        try:
            response = requests.get(competition_link).json()
        except:
            caption = 'undefined'
        else:
            caption = response['caption']

        return {
            'service_id': data['id'],
            'teams': [
                {'name': data['awayTeamName'], 'id': data['awayTeamId']},
                {'name': data['homeTeamName'], 'id': data['homeTeamId']}
            ],
            'starts_at': datetime.strptime(data['date'], '%Y-%m-%dT%H:%M:%SZ'),
            'name': caption, 'source_service': self.service_id
        }
