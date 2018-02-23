@extends('dashboard.layouts.auth')

@section('title', 'Reset password')


@section ('contents')

	<p class="login-box-msg">Reset Password.</p>

	{{-- {{ var_dump($errors) }} --}}

	<form action="{{ route('dashboard.password.reset.post') }}" method="post">
		<div class="form-group has-feedback @if ($errors->has('email')) has-error @endif">
			<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ $email or old('email') }}" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="form-group has-feedback @if ($errors->has('password')) has-error @endif">
			<input type="password" name="password" class="form-control" placeholder="New Password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
				<span class="help-block">{{ $errors->first('password') }}</span>
			@endif
		</div>
		<div class="form-group has-feedback @if ($errors->has('password_confirmation')) has-error @endif">
			<input type="password" name="password_confirmation" class="form-control" placeholder="New Password_confirmation" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password_confirmation'))
				<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
			@endif
		</div>
		{{ csrf_field() }}
		<input type="hidden" name="token" value="{{ $token }}">
		<button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
	</form>

@endsection