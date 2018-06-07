from django.test import TestCase

from apps.users import models


class ModelManagerTestCase(TestCase):

    def test_create_user(self):
        """ Test create_user method """
        email = 'test@example.com'
        password = 'pass'
        user = models.User.objects.create_user(email=email,
                                               password=password)

        self.assertTrue(user.is_active)
        self.assertEqual(user.email, email)
        self.assertTrue(user.check_password(password))
        self.assertFalse(user.is_staff)
        self.assertFalse(user.is_superuser)

    def test_create_superuser(self):
        """ Test create_superuser method """
        email = 'test@example.com'
        password = 'pass'
        user = models.User.objects.create_superuser(email=email,
                                                    password=password)

        self.assertTrue(user.is_active)
        self.assertEqual(user.email, email)
        self.assertTrue(user.check_password(password))
        self.assertTrue(user.is_staff)
        self.assertTrue(user.is_superuser)
