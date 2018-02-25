<tr>
	<td>{{ formatPermissionName($permission->name) }}</td>
	<td>{{ $permission->details }}</td>
	<td class="text-right">
		<a href="#" class="btn btn-warning btn-xs btn-flat" title="Remove this permission from role." data-toggle="modal" data-target="#role-permission-{{ $permission->id }}-delete-modal">Remove Permission</a>
		@include('dashboard.roles.partials._modal-remove-role-permission', compact('role', 'permission'))
	</td>
</tr>