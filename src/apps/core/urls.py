from django.urls import path

from apps.core import views as app_views

urlpatterns = [
    path('', app_views.IndexView.as_view(), name='index'),
    path('recently', app_views.AfterLoginView.as_view(), name='recently'),
    path('history', app_views.HistoryListView.as_view(), name='history'),
    path('open-bets', app_views.OpenBetsListView.as_view(), name='open-bets'),
]
