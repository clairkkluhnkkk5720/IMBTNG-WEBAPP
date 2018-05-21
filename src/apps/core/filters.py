import django_filters
from apps.core.models import Event, EventCategory


class EventFilter(django_filters.FilterSet):
    query = django_filters.CharFilter(name='name', lookup_expr='icontains')

    class Meta:
        model = Event
        fields = ('query', 'category')
