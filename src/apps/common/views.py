class BootstrapFormViewMixin(object):

    def get_form(self, *args, **kwargs):
        form = super().get_form(*args, **kwargs)
        for field in form.fields:
            form.fields[field].widget.attrs.update({
                'class': 'form-control',
                'placeholder': form.fields[field].label
            })
        return form


class UserProfileRequiredMixin(object):
    pass

