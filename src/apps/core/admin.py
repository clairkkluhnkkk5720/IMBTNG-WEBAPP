from django.contrib import admin

from apps.core import models


class GameAdmin(admin.ModelAdmin):
    prepopulated_fields = {
        'slug': ('name',)
    }


admin.site.register(models.Athlete)
admin.site.register(models.Bet)
admin.site.register(models.Event)
admin.site.register(models.EventCategory)
admin.site.register(models.Game, GameAdmin)
admin.site.register(models.Team)
admin.site.register(models.Transaction)
