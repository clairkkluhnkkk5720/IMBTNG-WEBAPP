@extends('dashboard.layouts.app')

@section('title', 'Admins')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Admins</h3>
			<div class="box-tools">
				<a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary btn-flat btn-sm">Create new Admin</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Member from</th>
						<th class="text-right">Actions</th>
					</tr>
					@each('dashboard.admins.partials._single-admin', $admins, 'admin')
				</table>
			</div>
		</div>
		<!-- /.box-body -->
		@if ($admins->total() > 15)
			<div class="box-footer clearfix">
				{{ $admins->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif
	</div>
	<!-- /.box -->

@endsection