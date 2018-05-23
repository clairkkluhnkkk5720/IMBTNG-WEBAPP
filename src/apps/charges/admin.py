from django.contrib import admin

from apps.charges.models import Charge, Customer

admin.site.register(Charge)
admin.site.register(Customer)
