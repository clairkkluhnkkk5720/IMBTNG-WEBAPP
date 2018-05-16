from django.contrib.auth.mixins import LoginRequiredMixin
from django.views import generic

from apps.common.views import UserProfileRequiredMixin


class IndexView(generic.TemplateView):
    template_name = 'core/index.html'


class AfterLoginView(UserProfileRequiredMixin, LoginRequiredMixin,
                     generic.TemplateView):
    template_name = 'core/after-login.html'


class HistoryListView(UserProfileRequiredMixin, LoginRequiredMixin,
                      generic.TemplateView):
    template_name = 'core/history.html'


class OpenBetsListView(UserProfileRequiredMixin, LoginRequiredMixin,
                       generic.TemplateView):
    template_name = 'core/open-bets.html'
