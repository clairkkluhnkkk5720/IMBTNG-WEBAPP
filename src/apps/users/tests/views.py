from unittest import mock

from django.contrib.auth import get_user_model
from django.test import TestCase
from django.urls import reverse

from apps.accounts.models import ReferralRecord
from apps.users import views

UserModel = get_user_model()


class ViewsTestCase(TestCase):

    @classmethod
    def setUpTestData(cls):
        cls.user_signup_data = {
            'wallet': 'http://test.com',
            'username': 'admin',
            'email': '79889501003@yandex.ru',
            'phone': '+79998887766',
            'first_name': 'test_first_name',
            'last_name': 'test_last_name',
            'password1': 'pass0911',
            'password2': 'pass0911',
        }  # user data for signup api

    @mock.patch.object(views.SignUpView, 'send_confirmation_email')
    @mock.patch.object(views.SignUpView, 'process_referral')
    def test_signup_successful(self, mocked_method_referral,
                               mocked_method_email):
        """
        Test signup view handler.

        Steps:
        - send user data
        - create user and account
        - send confirmation link to email (only check call)
        - process referral cookies (only check call)

        :param mocked_method_referral: views.SignUpView.process_referral mock
        :param mocked_method_email: views.SignUpView.process_referral mock
        :return: None
        """

        url = reverse('users:signup')
        data = self.user_signup_data.copy()
        response = self.client.post(url, data=data)

        self.assertEqual(response.status_code, 302)
        self.assertEqual(response.get('Location'), reverse('core:index'))

        self.assertTrue(UserModel.objects.filter(
            account__username=data['username']).exists())
        user = UserModel.objects.get(account__username=data['username'])
        self.assertFalse(user.is_active)
        mocked_method_referral.assert_called_once_with(user)
        mocked_method_email.assert_called_once_with(user)

    def test_signup_without_phone(self):
        """
        Test signup without Phone Number.
        User shouldn't be created if his phone number is not defined.
        """
        url = reverse('users:signup')
        data = dict(self.user_signup_data, phone='')
        response = self.client.post(url, data=data)

        self.assertEqual(response.status_code, 200)

        with self.assertRaises(UserModel.DoesNotExist):
            UserModel.objects.get(account__username=data['username'])

    def test_signup_without_email(self):
        """
        Test signup without Email.
        User shouldn't be created if his email is not defined.
        """
        url = reverse('users:signup')
        data = dict(self.user_signup_data, email='test')
        response = self.client.post(url, data=data)

        self.assertEqual(response.status_code, 200)

        with self.assertRaises(UserModel.DoesNotExist):
            UserModel.objects.get(account__username=data['username'])

    @mock.patch.object(views.SignUpView, 'send_confirmation_email')
    def test_signup_referrals(self, mocked_confirmation_email):
        """
        Test referral records on signup.
        If user has visited referral url from another user,
        then after his registration we should create referral record
        with user relations.

        :param mocked_confirmation_email:
                                views.SignUpView.mocked_confirmation_email mock
        """
        main_user = UserModel.objects.create(email='test@example.com')

        # go to referral url
        url = reverse('users:ref', kwargs={'pk': main_user.pk})
        self.client.get(url)

        with self.assertRaises(ReferralRecord.DoesNotExist):
            ReferralRecord.objects.get(user=main_user)

        # sign up with cookies after referral
        url = reverse('users:signup')
        data = self.user_signup_data.copy()
        self.client.post(url, data=data)

        referral = ReferralRecord.objects.get(user=main_user)
        self.assertEqual(referral.status, ReferralRecord.STATUS_CHOICES.WAIT)
        self.assertEqual(referral.referral.account.username, data['username'])
