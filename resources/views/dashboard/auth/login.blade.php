@extends('dashboard.layouts.auth')

@section('title', 'Login')


@section ('contents')

	<p class="login-box-msg">Please Login to Continue</p>

	{{-- {{ var_dump($errors) }} --}}

	<form action="{{ route('dashboard.login.post') }}" method="post">
		<div class="form-group has-feedback @if ($errors->has('email')) has-error @endif">
			<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="form-group has-feedback @if ($errors->has('password')) has-error @endif">
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
				<span class="help-block">{{ $errors->first('password') }}</span>
			@endif
		</div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label><input name="remember" type="checkbox">&nbsp;&nbsp;&nbsp;Remember Me</label>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

	<br>

	<a href="{{ route('dashboard.password.request') }}">I forgot my password</a><br>

@endsection