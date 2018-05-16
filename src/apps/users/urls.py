from django.urls import path

from apps.users import views as app_views

urlpatterns = [
    path('signup', app_views.SignUpView.as_view(), name='signup'),
    path('logout', app_views.SignOutView.as_view(), name='logout'),
]
