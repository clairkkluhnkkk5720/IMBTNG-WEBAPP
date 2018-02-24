@extends('dashboard.layouts.app')

@section('title', 'Roles')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Roles</h3>
			<div class="box-tools">
				<a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary btn-flat btn-sm">Create new Role</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered">
				<tr>
					<th>Name</th>
					<th>Details</th>
					<th>Total Permissions</th>
					<th>Total Admins</th>
					<th class="text-right">Actions</th>
				</tr>
				@foreach ($roles as $role)
					<tr>
						<td><a href="{{ route('dashboard.roles.show', $role->id) }}">{{ $role->name }}</a></td>
						<td>{{ $role->details }}</td>
						<td>{{ $role->permissions_count }}</td>
						<td>{{ $role->admins_count }}</td>
						<td class="text-right">
							<a href="{{ route('dashboard.roles.show', $role->id) }}" class="btn btn-xs btn-success btn-flat" title="View this role."><i class="fa fa-eye"></i></a>
							<a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-xs btn-primary btn-flat" title="Edit this role."><i class="fa fa-pencil"></i></a>
							<a href="#" class="btn btn-xs btn-danger btn-flat" title="Delete this role."><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
		<!-- /.box-body -->
		@if ($roles->total() > 15)
			<div class="box-footer clearfix">
				{{ $roles->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif
	</div>
	<!-- /.box -->

@endsection