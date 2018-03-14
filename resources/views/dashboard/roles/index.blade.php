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
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Details</th>
						<th>Total Permissions</th>
						<th>Total Admins</th>
						<th class="text-right">Actions</th>
					</tr>
					@each('dashboard.roles.partials._single-role', $roles, 'role')
				</table>
			</div>
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