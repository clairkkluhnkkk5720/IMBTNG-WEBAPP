@extends('dashboard.layouts.app')

@section('title', 'Role')

@section('contents')

	@include('dashboard.roles.partials._modal-delete-role', compact('role'))

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Role</h3>
			<div class="box-tools">
				<a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-primary btn-flat btn-sm" title="Edit this role.">Edit</a>
				<a href="#" class="btn btn-danger btn-flat btn-sm" title="Delete this role." data-toggle="modal" data-target="#role-{{ $role->id }}-delete-modal">Delete</a>
			</div>
		</div>
		<div class="box-body">
			<h4>Name: <strong>{{ $role->name }}</strong></h4>
			<p>Details: <strong>{{ $role->details }}</strong></p>
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<h4>Permissions:</h4>
					<hr>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<th>Details</th>
								<th class="text-right">Actions</th>
							</tr>
							@foreach($permissions as $permission)
								@include('dashboard.roles.partials._single-role-permission', compact('role', 'permission'))
							@endforeach
						</table>
					</div>
				</div>
				<div class="col-lg-6">
					<h4>Admins:</h4>
					<hr>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th class="text-right">Actions</th>
							</tr>
							@each('dashboard.roles.partials._single-role-admin', $admins, 'admin')
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.box -->

@endsection