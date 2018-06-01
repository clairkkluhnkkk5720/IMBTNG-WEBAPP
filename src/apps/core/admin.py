from django.contrib import admin
from django.utils.translation import ugettext_lazy as _
from solo.admin import SingletonModelAdmin

from apps.core import models


class SluggedModelAdmin(admin.ModelAdmin):
    prepopulated_fields = {
        'slug': ('name',)
    }


class EventAdmin(SluggedModelAdmin):
    list_display = ('id', 'name', 'category', 'starts_at')
    list_display_links = ('id', 'name')
    search_fields = ('name',)
    list_filter = ('published', 'starts_at', 'category')
    filter_horizontal = ('teams',)


admin.site.site_header = _('IMBTING')
admin.site.site_title = _('IMBTING Administration')

admin.site.register(models.Athlete)
admin.site.register(models.SiteConfig, SingletonModelAdmin)
admin.site.register(models.Bet)
admin.site.register(models.Event, EventAdmin)
admin.site.register(models.EventCategory)
admin.site.register(models.Team, SluggedModelAdmin)
admin.site.register(models.Transaction)
