<tr>
	<td>{{ $admin->firstname }}</td>
	<td>{{ $admin->lastname }}</td>
	<td>{{ $admin->email }}</td>
	<td>{{ $admin->phone }}</td>
	<td>{{ $admin->created_at->toFormattedDateString() }}</td>
	<td class="text-right">
		<a href="#" class="btn btn-xs btn-success btn-flat" title="View Profile"><i class="fa fa-eye"></i></a>
		<a href="#" class="btn btn-xs btn-primary btn-flat" title="Edit this Admin Profile"><i class="fa fa-pencil"></i></a>
		<a href="#" class="btn btn-xs btn-danger btn-flat" title="Delete this Admin"><i class="fa fa-trash"></i></a>
	</td>
</tr>