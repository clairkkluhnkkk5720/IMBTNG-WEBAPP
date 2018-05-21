from django import template

register = template.Library()


@register.filter()
def convert_list_by_range(queryset, field_name):
    result = []
    last_date = None
    couple = []
    for obj in queryset:
        if last_date != getattr(obj, field_name).date():
            if len(couple) > 0:
                result.append({'date': last_date, 'items': couple})
            last_date = getattr(obj, field_name).date()
            couple = []
        couple.append(obj)
    if len(couple) > 0:
        result.append({'date': last_date, 'items': couple})
    return result
