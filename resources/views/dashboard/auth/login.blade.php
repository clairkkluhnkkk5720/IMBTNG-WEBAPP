@extends('dashboard.layouts.auth')

@section('title', 'Login')


@section ('contents')

	<p class="login-box-msg">Please Login to Continue</p>

	<form action="{{ route('dashboard.login.post') }}" method="post">
		<div class="form-group has-feedback">
			<input type="email" name="email" class="form-control" placeholder="Email or Username" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
					<label><input type="checkbox">&nbsp;&nbsp;&nbsp;Remember Me</label>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

	<br>

	<a href="{{ route('dashboard.password.request') }}">I forgot my password</a><br>

@endsection