from django.urls import path

from apps.charges import views as app_views

urlpatterns = [
    path('charge', app_views.ChargeCreateView.as_view(), name='charge'),
    path('charge/status', app_views.ChargeStatusView.as_view(), name='charge-status'),
]
