from decimal import Decimal

from django.contrib import messages
from django.contrib.auth.mixins import LoginRequiredMixin
from django.db import transaction
from django.db.models import F
from django.http import HttpResponseRedirect
from django.shortcuts import get_object_or_404
from django.urls import reverse
from django.utils import timezone
from django.utils.translation import ugettext_lazy as _
from django.views import generic
from django_filters.views import FilterView

from apps.common.views import UserProfileRequiredMixin
from apps.core import models
from apps.core.filters import EventFilter
from apps.core.models import SiteConfig


class IndexView(generic.TemplateView):
    template_name = 'core/index.html'


class AfterLoginView(UserProfileRequiredMixin, LoginRequiredMixin,
                     FilterView):
    template_name = 'core/after-login.html'
    queryset = models.Event.objects.filter(published=True)
    paginate_by = 10
    filterset_class = EventFilter

    def get_queryset(self):
        return self.queryset.filter(starts_at__date=timezone.now().date())

    def get_context_data(self, *, object_list=None, **kwargs):
        context = super().get_context_data(object_list=None, **kwargs)
        context[''] = models.EventCategory.objects.all()
        context['categories'] = models.EventCategory.objects.all()
        context['upcoming_events'] = models.Event.objects.all().order_by(
            '-starts_at')[:20]
        return context


class BaseBetsListView(generic.ListView):
    template_name = 'core/bets.html'
    paginate_by = 20
    page_title = ''

    def get_queryset(self):
        return self.request.user.bets.all().order_by('-created_at')

    def get_context_data(self, *, object_list=None, **kwargs):
        context = super().get_context_data(object_list=None, **kwargs)
        context['page_title'] = self.page_title
        context['upcoming_events'] = models.Event.objects.filter(
            starts_at__gte=timezone.now() + timezone.timedelta(hours=1)
        ).order_by('-starts_at')[:20]
        return context


class HistoryListView(UserProfileRequiredMixin, LoginRequiredMixin,
                      BaseBetsListView):
    page_title = _('History')


class OpenBetsListView(UserProfileRequiredMixin, LoginRequiredMixin,
                       BaseBetsListView):
    page_title = _('Open Bets')

    def get_queryset(self):
        return super().get_queryset().filter(
            status=models.Bet.STATUS_CHOICES.WAIT
        )


class EventDetailView(generic.DetailView):
    template_name = 'core/event-detail.html'
    model = models.Event

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['upcoming_events'] = models.Event.objects.filter(
            starts_at__gte=timezone.now() + timezone.timedelta(hours=1)
        ).order_by('-starts_at')[:20]
        return context


class EventBetView(generic.CreateView):
    template_name = 'core/event-bet.html'
    model = models.Bet
    fields = ('team', 'amount')

    def get_success_url(self):
        return reverse('core:place-bet', args=[self.event.id])

    def get_form(self, form_class=None):
        form = super().get_form(form_class=form_class)
        form.fields['team'].queryset = self.event.teams.all()
        return form

    def dispatch(self, request, *args, **kwargs):
        self.event = get_object_or_404(models.Event, pk=kwargs['pk'])
        self.already_exists = self.request.user.bets.filter(
            event_id=self.event.id).exists()
        return super().dispatch(request, *args, **kwargs)

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['event'] = self.event
        context['upcoming_events'] = models.Event.objects.filter(
            starts_at__gte=timezone.now() + timezone.timedelta(hours=1)
        ).order_by('-starts_at')[:20]
        if self.already_exists:
            context['registered_bet'] = self.request.user.bets.get(
                event_id=self.event.id)
        return context

    @transaction.atomic
    def form_valid(self, form):
        if self.already_exists:
            messages.info(self.request, _('Bet for this event already exists'))
            return HttpResponseRedirect(self.get_success_url())
        current_account = self.request.user.account
        account = type(current_account).objects.select_for_update().get(
            pk=current_account.pk
        )
        if account.deposit < form.cleaned_data['amount']:
            messages.info(self.request,
                          _('You have to replenish your deposit'))
            return HttpResponseRedirect(self.get_success_url())
        self.object = form.save(commit=False)
        site_config = SiteConfig.get_solo()
        self.object.system_fee = self.object.amount * \
                                 site_config.bet_percent / Decimal(100.0)
        account.deposit = F('deposit') - self.object.amount
        self.object.amount -= self.object.system_fee
        self.object.event_id = self.event.id
        self.object.user_id = self.request.user.id
        self.object.save()
        account.save(update_fields=['deposit'])
        return HttpResponseRedirect(self.get_success_url())
