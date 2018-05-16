from django.shortcuts import redirect
from django.urls import reverse_lazy


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
    """
    Restrict access for users without account profile.
    If user doesn't have account profile then he will be redirected
    on `result_redirect_url`.
    If user is admin or manager then he will be redirected on admin work space.
    """

    result_redirect_url = reverse_lazy('core:index')

    def dispatch(self, request, *args, **kwargs):
        if not hasattr(request.user, 'account'):
            if request.user.is_staff:
                return redirect('admin:index')
            return redirect(self.result_redirect_url)
        return super().dispatch(request, *args, **kwargs)


class AuthenticatedRedirectMixin(object):
    """
    Mixin class should be used for granting access only unauthorized views.
    If user is authorized then he will be redirected on `result_redirect_url`.
    """

    result_redirect_url = reverse_lazy('core:index')

    def dispatch(self, request, *args, **kwargs):
        if request.user.is_authenticated:
            return redirect('core:index')
        return super().dispatch(request, *args, **kwargs)

