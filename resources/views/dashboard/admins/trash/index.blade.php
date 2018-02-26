@extends('dashboard.layouts.app')

@section('title', 'Deleted Admins')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Deleted Admins</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Member from</th>
					<th class="text-right">Actions</th>
				</tr>
				@each('dashboard.admins.partials._single-deleted-admin', $admins, 'admin')
			</table>
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