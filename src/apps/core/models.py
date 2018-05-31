from django.core.exceptions import ValidationError
from django.db import models
from django.utils.translation import ugettext_lazy as _
from model_utils import Choices
from solo.models import SingletonModel

import settings
from apps.common.models import TimeStampedModel


class Athlete(TimeStampedModel):
    name = models.CharField(max_length=191)
    slug = models.CharField(unique=True, max_length=191)
    details = models.TextField(blank=True, null=True)
    image = models.CharField(max_length=191, blank=True, null=True)

    class Meta:
        verbose_name = _('athlete')
        verbose_name_plural = _('athletes')


class Bet(TimeStampedModel):
    STATUS_CHOICES = Choices(
        (None, 'WAIT', _('Wait')),
        (True, 'WON', _('Won')),
        (False, 'LOS', _('Lost')),
    )
    user = models.ForeignKey(settings.AUTH_USER_MODEL, models.PROTECT,
                             related_name='bets')
    event = models.ForeignKey('Event', models.PROTECT, related_name='+')
    team = models.ForeignKey('Team', on_delete=models.CASCADE, null=True)

    amount = models.IntegerField()
    status = models.NullBooleanField(verbose_name=_('status'), default=None,
                                     choices=STATUS_CHOICES)

    class Meta:
        unique_together = (
            ('user', 'event')
        )
        verbose_name = _('bet')
        verbose_name_plural = _('bets')

    def get_event_id(self):
        first_letter = self.event.category.name[0].upper()
        event_id = self.event_id
        return '{letter}{event_id}'.format(letter=first_letter,
                                           event_id=event_id)


class EventCategory(TimeStampedModel):
    name = models.CharField(_('name'), max_length=256)

    def __str__(self):
        return self.name

    class Meta:
        ordering = ('name',)
        verbose_name = _('event category')
        verbose_name_plural = _('event categories')


class Event(TimeStampedModel):
    published = models.BooleanField(_('published'), default=False)
    name = models.CharField(_('title'), max_length=191)
    slug = models.SlugField(_('slug'), unique=True)
    notes = models.TextField(_('details'), blank=True, null=True)
    starts_at = models.DateTimeField(_('starts at'), blank=True, null=True)
    category = models.ForeignKey(EventCategory, models.PROTECT,
                                 related_name='+',
                                 verbose_name=_('category'))
    logo = models.FileField(_('logo'), default='', blank=True)
    logo_url = models.CharField(_('logo url'), default='', blank=True,
                                max_length=1024)
    teams = models.ManyToManyField('Team', blank=True,
                                   verbose_name=_('teams'))

    def __str__(self):
        return 'Event: {} - {}'.format(self.name, self.starts_at)

    class Meta:
        verbose_name = _('event')
        verbose_name_plural = _('events')

    def clean(self):
        if self.published and not self.logo and not self.logo_url:
            raise ValidationError({
                'logo': _('Logo or Logo Url field is required on '
                          'publishing step'),
                'logo_url': _('Logo or Logo Url field is required on '
                              'publishing step'),
            })


class Team(TimeStampedModel):
    name = models.CharField(_('name'), max_length=256)
    slug = models.SlugField(_('slug'), unique=True)
    details = models.TextField(_('details'), blank=True, null=True)
    athletes = models.ManyToManyField('Athlete', related_name='teams',
                                      verbose_name=_('athletes'), blank=True)
    image = models.CharField(max_length=191, blank=True, null=True)

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = _('team')
        verbose_name_plural = _('teams')


class Transaction(TimeStampedModel):
    user = models.ForeignKey(settings.AUTH_USER_MODEL, models.PROTECT,
                             related_name='+')
    base_type = models.IntegerField()
    amount = models.IntegerField()
    bet = models.ForeignKey(Bet, models.PROTECT, related_name='+', blank=True,
                            null=True)
    details = models.TextField(blank=True, null=True)

    class Meta:
        verbose_name = _('transaction')
        verbose_name_plural = _('transactions')


class SiteConfig(SingletonModel):

    bet_percent = models.DecimalField(verbose_name=_('bet percent'), max_digits=10,
                                      decimal_places=2, default=0)

    class Meta:
        verbose_name = _('site config')
        verbose_name_plural = _('site config')
