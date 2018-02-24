@extends('dashboard.layouts.app')

@section('title', 'Create Role')

@section('contents')

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Create Role</h3>
		</div>
		<!-- /.box-header -->
		<form role="form" method="POST" action="{{ route('dashboard.roles.store') }}">
			<div class="box-body">
				<div class="form-group">
					<label for="role-name">Role Name *</label>
					<input type="text" name="name" class="form-control" id="role-name" placeholder="Enter Role Name">
				</div>
				<div class="form-group">
					<label for="role-details">Role Details <small>(optional)</small></label>
					<textarea row="2" class="form-control" name="details" id="role-details" placeholder="Enter Role Details"></textarea>
				</div>
				<div class="checkbox">
					<h4>Choose Permission:</h4>
				</div>
				<div class="row">
					@foreach ($permissions as $permission)
						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="form-group">
								<label>
									<input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="minimal">
									&nbsp;&nbsp;{{ formatPermissionName($permission->name) }}
								</label>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary btn-flat">CREATE</button>
			</div>
		</form>
	</div>
	<!-- /.box -->

@endsection

@section('styles')

	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="/dashboard-assets/plugins/iCheck/all.css">

@endsection

@section('scripts')

	<!-- iCheck 1.0.1 -->
	<script src="/dashboard-assets/plugins/iCheck/icheck.min.js"></script>

	<script>
		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass   : 'iradio_minimal-blue'
		});
	</script>

@endsection