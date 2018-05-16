from django.contrib.auth.mixins import LoginRequiredMixin
from django.views import generic


class IndexView(generic.TemplateView):
    template_name = 'core/index.html'


class AfterLoginView(LoginRequiredMixin, generic.TemplateView):
    template_name = 'core/after-login.html'


class HistoryListView(LoginRequiredMixin, generic.TemplateView):
    template_name = 'core/history.html'


class OpenBetsListView(LoginRequiredMixin, generic.TemplateView):
    template_name = 'core/open-bets.html'
