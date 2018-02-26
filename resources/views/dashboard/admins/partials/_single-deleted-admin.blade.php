<tr>
	<td>{{ $admin->firstname }}</td>
	<td>{{ $admin->lastname }}</td>
	<td>{{ $admin->email }}</td>
	<td>{{ $admin->phone }}</td>
	<td>{{ $admin->created_at->toFormattedDateString() }}</td>
	<td class="text-right">
		<a href="" class="btn btn-xs btn-flat btn-success"><i class="fa fa-eye"></i></a>
		<a href="#" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-window-restore"></i></a>
		<a href="#" class="btn btn-xs btn-flat btn-danger"><i class="fa fa-trash"></i></a>
	</td>
</tr>