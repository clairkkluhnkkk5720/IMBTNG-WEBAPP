<h4>{{ $role->name }}</h4>
<p>{{ $role->details }}</p>
<a href="{{ route('dashboard.roles.show', $role->id) }}" class="btn btn-sm btn-success btn-flat">View Role</a>
<hr>