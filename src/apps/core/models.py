from django.db import models
from django.utils.translation import ugettext_lazy as _
from easy_thumbnails.fields import ThumbnailerImageField
from model_utils import Choices

import settings
from apps.common.models import TimeStampedModel


class Athlete(TimeStampedModel):
    name = models.CharField(max_length=191)
    slug = models.CharField(unique=True, max_length=191)
    details = models.TextField(blank=True, null=True)
    image = models.CharField(max_length=191, blank=True, null=True)
    game = models.ForeignKey('Game', models.PROTECT, related_name='+')

    class Meta:
        verbose_name = _('athlete')
        verbose_name_plural = _('athletes')


class Bet(TimeStampedModel):
    STATUS_CHOICES = Choices(
        (True, 'WON', _('Won')),
        (False, 'LOS', _('Lost')),
    )
    user = models.ForeignKey(settings.AUTH_USER_MODEL, models.PROTECT,
                             related_name='+')
    event = models.ForeignKey('Event', models.PROTECT, related_name='+')
    player_id = models.PositiveIntegerField()
    amount = models.IntegerField()
    won = models.BooleanField(default=False, choices=STATUS_CHOICES)

    class Meta:
        verbose_name = _('bet')
        verbose_name_plural = _('bets')


class EventCategory(TimeStampedModel):
    name = models.CharField(_('name'), max_length=256)

    class Meta:
        verbose_name = _('event category')
        verbose_name_plural = _('event categories')


class Event(TimeStampedModel):
    title = models.CharField(_('title'), max_length=191)
    slug = models.SlugField(_('slug'), unique=True)
    details = models.TextField(_('details'), blank=True, null=True)
    starts_at = models.DateTimeField(_('starts at'), blank=True, null=True)
    banner = ThumbnailerImageField(_('banner'), blank=True, null=True)
    thumb = ThumbnailerImageField(_('thumbnail'), blank=True, null=True)
    game = models.ForeignKey('Game', models.PROTECT, related_name='+',
                             verbose_name=_('game'))
    event_category = models.ForeignKey(EventCategory, models.PROTECT,
                                       related_name='+',
                                       verbose_name=_('category'))
    winner_id = models.PositiveIntegerField(_('Winner ID'), blank=True,
                                            null=True)

    class Meta:
        verbose_name = _('event')
        verbose_name_plural = _('events')


class Game(TimeStampedModel):
    name = models.CharField(_('name'), max_length=191)
    slug = models.CharField(_('slug'), unique=True, max_length=191)
    details = models.TextField(_('details'), blank=True, null=True)
    banner = models.CharField(_('banner'), max_length=191, blank=True,
                              null=True)
    thumb = models.CharField(_('thumb'), max_length=191, blank=True, null=True)
    icon = models.CharField(_('icon'), max_length=191, blank=True, null=True)

    class Meta:
        verbose_name = _('game')
        verbose_name_plural = _('games')


class Team(TimeStampedModel):
    name = models.CharField(_('name'), max_length=256)
    slug = models.SlugField(_('slug'), unique=True)
    details = models.TextField(_('details'), blank=True, null=True)
    game = models.ForeignKey(Game, models.PROTECT, verbose_name=_('game'),
                             related_name='+')
    athletes = models.ManyToManyField('Athlete', related_name='teams',
                                      verbose_name=_('athletes'))
    image = models.CharField(max_length=191, blank=True, null=True)

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


class EventTeam(models.Model):
    event = models.ForeignKey('Event', models.CASCADE)
    team = models.ForeignKey('Team', models.CASCADE)

    class Meta:
        verbose_name = _('event teams')
        verbose_name_plural = _('event teams')


class AthleteTeam(models.Model):
    athlete = models.ForeignKey('Athlete', models.CASCADE)
    team = models.ForeignKey('Team', models.CASCADE)

    class Meta:
        verbose_name = _('athlete team')
        verbose_name_plural = _('athlete teams')


class AthleteEvent(models.Model):
    athlete = models.ForeignKey('Athlete', models.CASCADE)
    event = models.ForeignKey('Event', models.CASCADE)

    class Meta:
        verbose_name = _('athlete event')
        verbose_name_plural = _('athlete events')
