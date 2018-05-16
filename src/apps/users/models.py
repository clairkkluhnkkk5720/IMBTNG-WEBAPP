from django.conf import settings
from django.utils import timezone
from django.utils.translation import ugettext_lazy as _
from django.contrib.auth.base_user import AbstractBaseUser, BaseUserManager
from django.contrib.auth.models import PermissionsMixin
from django.db import models
from easy_thumbnails.fields import ThumbnailerImageField


class UserManager(BaseUserManager):
    use_in_migrations = True

    def _create_user(self, email, password, **extra_fields):
        """
        Creates and saves a User with the given username, email and password.
        """
        if not email and not extra_fields.get('username', None):
            raise ValueError('The given username must be set')
        email = self.normalize_email(email)
        user = self.model(email=email, **extra_fields)
        user.set_password(password)
        user.save(using=self._db)
        return user

    def create_user(self, email, password=None, **extra_fields):
        extra_fields.setdefault('is_staff', False)
        extra_fields.setdefault('is_superuser', False)
        return self._create_user(email, password, **extra_fields)

    def create_superuser(self, email, password, **extra_fields):
        extra_fields.setdefault('is_active', True)
        extra_fields.setdefault('is_staff', True)
        extra_fields.setdefault('is_superuser', True)

        if extra_fields.get('is_staff') is not True:
            raise ValueError('Superuser must have is_staff=True.')
        if extra_fields.get('is_superuser') is not True:
            raise ValueError('Superuser must have is_superuser=True.')

        return self._create_user(email, password, **extra_fields)

    def generate_superuser(self):
        """
        Создание супервользователя.
        """
        return self.create_superuser(settings.ADMIN_EMAIL, '1')


class AbstractUser(AbstractBaseUser, PermissionsMixin):
    first_name = models.CharField(_('first name'), max_length=512, default='',
                                  blank=True)
    last_name = models.CharField(_('last name'), max_length=512, default='',
                                 blank=True)
    email = models.EmailField(_('email'), db_index=True, unique=True)
    is_staff = models.BooleanField(
        _('staff status'),
        default=False,
        help_text=_(
            'Designates whether the user can log into this admin site.'),
    )
    is_active = models.BooleanField(
        _('active'),
        default=True,
        help_text=_(
            'Designates whether this user should be treated as active. '
            'Unselect this instead of deleting accounts.'
        ),
    )
    date_joined = models.DateTimeField(_('date joined'), default=timezone.now)
    updated_at = models.DateTimeField(_('updated at'), blank=True, null=True,
                                      default=None)
    deleted_at = models.DateTimeField(_('deleted at'), blank=True, null=True,
                                      default=None)

    objects = UserManager()

    USERNAME_FIELD = 'email'

    def get_full_name(self):
        full_name = self.email
        if self.first_name or self.last_name:
            full_name = '{first_name} {last_name}'.format(
                first_name=self.first_name,
                last_name=self.last_name
            ).strip()
        return full_name

    class Meta:
        abstract = True


class User(AbstractUser):
    phone = models.CharField(_('phone'), unique=True, max_length=191)
    avatar = ThumbnailerImageField(_('avatar'), blank=True, null=True)

    class Meta:
        verbose_name = _('user')
        verbose_name_plural = _('users')
