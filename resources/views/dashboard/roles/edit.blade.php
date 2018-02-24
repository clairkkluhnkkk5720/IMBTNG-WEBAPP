@extends('dashboard.layouts.app')

@section('title', 'Edit Role')

@section('contents')

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Role</h3>
		</div>
		<!-- /.box-header -->
		<form role="form" method="POST" action="{{ route('dashboard.roles.update', $role->id) }}">
			<div class="box-body">
				<div class="form-group @if ($errors->has('name')) has-error @endif">
					<label for="role-name">Role Name *</label>
					<input type="text" name="name" class="form-control" id="role-name" value="{{ $role->name }}" placeholder="Enter Role Name" >
					@if ($errors->has('name'))
						<span class="help-block">{{ $errors->first('name') }}</span>
					@endif
				</div>
				<div class="form-group @if ($errors->has('details')) has-error @endif">
					<label for="role-details">Role Details <small>(optional)</small></label>
					<textarea row="2" class="form-control" name="details" id="role-details" placeholder="Enter Role Details">{{ $role->details }}</textarea>
					@if ($errors->has('details'))
						<span class="help-block">{{ $errors->first('details') }}</span>
					@endif
				</div>
				<div class="checkbox">
					<hr>
					<h4>Choose Permission:</h4>
					@if ($errors->has('permissions'))
						<p class="text-danger">{{ $errors->first('permissions') }}</p>
					@endif
					<hr>
				</div>
				<div class="row">
					@foreach ($permissions as $permission)
						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="form-group">
								<label>
									<input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="minimal" 
										@if ( in_array($permission->id, $rolePermissions) )
											checked
										@endif
									>
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
				{{ method_field('PUT') }}
				<button type="submit" class="btn btn-success btn-flat">UPDATE</button>
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