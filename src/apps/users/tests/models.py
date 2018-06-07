from django.conf import settings
from django.test import TestCase

from apps.users import models


class ModelTestCase(TestCase):

    @classmethod
    def setUpTestData(cls):
        cls.user = models.User(first_name='TestFirstName',
                               last_name='TestLastName',
                               email='test@examole.com')

    def test_auth_model(self):
        """ Test settings AUTH_USER_MODEL config """
        expected_value = 'users.User'
        self.assertEqual(settings.AUTH_USER_MODEL, expected_value)

    def test_user_get_full_name(self):
        """ Test User.get_full_name """
        expected_value = '{first_name} {last_name}'.format(
            first_name=self.user.first_name, last_name=self.user.last_name
        )
        self.assertEqual(self.user.get_full_name(), expected_value)

    def test_user_str_method(self):
        """ Test User __str__ method """
        expected_value = self.user.email
        self.assertEqual(str(self.user), expected_value)
