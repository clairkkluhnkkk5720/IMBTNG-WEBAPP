from django.contrib.auth.mixins import LoginRequiredMixin
from django.utils import timezone
from django.utils.translation import ugettext_lazy as _
from django.views import generic
from django_filters.views import FilterView

from apps.common.views import UserProfileRequiredMixin
from apps.core import models
from apps.core.filters import EventFilter


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
