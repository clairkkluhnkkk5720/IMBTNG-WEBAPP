from django.urls import path

from apps.accounts import views as app_views

urlpatterns = [
    path('profile', app_views.ProfileView.as_view(), name='detail'),
    path('profile/update', app_views.ProfileUpdateView.as_view(), name='update'),
    path('profile/email', app_views.ProfileUpdateView.as_view(), name='email'),
    path('profile/deposit', app_views.ProfileDepositView.as_view(), name='deposit'),
]
