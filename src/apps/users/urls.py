from django.urls import path, re_path

from apps.users import views as app_views

urlpatterns = [
    path('signup', app_views.SignUpView.as_view(), name='signup'),
    path('activate/<str:uid_str>/<str:token>/', app_views.ConfirmEmailView.as_view(), name='email-confirm'),
    path('logout', app_views.SignOutView.as_view(), name='logout'),
]
