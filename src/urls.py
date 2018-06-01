from django.conf import settings
from django.conf.urls.static import static
from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('i18n/', include('django.conf.urls.i18n')),
    path('accounts/', include(('apps.accounts.urls', 'apps.accounts'), namespace='accounts')),
    path('accounts/', include('django.contrib.auth.urls')),
    path('charges/', include(('apps.charges.urls', 'apps.charges'), namespace='charges')),
    path('', include(('apps.core.urls', 'apps.core'), namespace='core')),
    path('', include(('apps.users.urls', 'apps.users'), namespace='users')),
    path('admin/', admin.site.urls),
    path('jet', include('jet.urls', namespace='jet')),
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL,
                          document_root=settings.MEDIA_ROOT)
