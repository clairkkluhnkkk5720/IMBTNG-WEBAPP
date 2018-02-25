<tr>
	<td><a href="{{ route('dashboard.roles.show', $role->id) }}">{{ $role->name }}</a></td>
	<td>{{ $role->details }}</td>
	<td>{{ $role->permissions_count }}</td>
	<td>{{ $role->admins_count }}</td>
	<td class="text-right">
		<a href="{{ route('dashboard.roles.show', $role->id) }}" class="btn btn-xs btn-success btn-flat" title="View this role."><i class="fa fa-eye"></i></a>
		<a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-xs btn-primary btn-flat" title="Edit this role."><i class="fa fa-pencil"></i></a>
		<a href="#" data-toggle="modal" data-target="#role-{{ $role->id }}-delete-modal" class="btn btn-xs btn-danger btn-flat" title="Delete this role."><i class="fa fa-trash"></i></a>
		@include('dashboard.roles.partials._modal-delete-role', compact('role'))
	</td>
</tr>