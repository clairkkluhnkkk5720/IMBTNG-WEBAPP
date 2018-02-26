@extends('dashboard.layouts.app')

@section('title', 'Create Admin')

@section('contents')

	<form class="row" method="POST" action="{{ route('dashboard.admins.store') }}">
		{{ csrf_field() }}
		<div class="col-md-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Create new Admin</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group @if ($errors->has('firstname')) has-error @endif">
								<label for="admin-firstname">Firstname</label>
								<input type="text" class="form-control" id="admin-firstname" name="firstname" placeholder="Firstname" value="{{ old('firstname') }}" required>
								@if ($errors->has('firstname'))
									<span class="help-block">{{ $errors->first('firstname') }}</span>
								@endif
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group @if ($errors->has('lastname')) has-error @endif">
								<label for="admin-lastname">Lastname</label>
								<input type="text" class="form-control" id="admin-lastname" name="lastname" placeholder="Lastname" value="{{ old('lastname') }}" required>
								@if ($errors->has('lastname'))
									<span class="help-block">{{ $errors->first('lastname') }}</span>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group @if ($errors->has('email')) has-error @endif">
								<label for="admin-email">Email Address</label>
								<input type="email" class="form-control" id="admin-email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
								@if ($errors->has('email'))
									<span class="help-block">{{ $errors->first('email') }}</span>
								@endif
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group @if ($errors->has('phone')) has-error @endif">
								<label for="admin-phone">Phone</label>
								<input type="phone" class="form-control" id="admin-phone" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
								@if ($errors->has('phone'))
									<span class="help-block">{{ $errors->first('phone') }}</span>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group @if ($errors->has('password')) has-error @endif">
								<label for="admin-password">Password</label>
								<input type="password" class="form-control" id="admin-password" name="password" placeholder="Password" value="{{ old('password') }}" required>
								@if ($errors->has('password'))
									<span class="help-block">{{ $errors->first('password') }}</span>
								@endif
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
								<label for="admin-password_confirmation">Confirm Password</label>
								<input type="text" class="form-control" id="admin-password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" required>
								@if ($errors->has('password_confirmation'))
									<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer visible-md visible-lg">
					<button type="submit" class="btn btn-md btn-success btn-flat">CREATE ADMIN</button>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header width-border">
					<h3 class="box-title">Assign Role:</h3>
				</div>
				<div class="box-body">
					@each('dashboard.admins.partials._role-checkbox', $roles, 'role')
				</div>
				<div class="box-footer hidden-md hidden-lg">
					<button type="submit" class="btn btn-md btn-success btn-flat">CREATE ADMIN</button>
				</div>
			</div>
		</div>
	</form>

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