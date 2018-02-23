@extends('dashboard.layouts.auth')

@section('title', 'Reset password')


@section ('contents')

	<p class="login-box-msg">Please fill this form.</p>

	{{-- {{ var_dump($errors) }} --}}

	<form action="{{ route('dashboard.password.email') }}" method="post">
		<div class="form-group has-feedback @if ($errors->has('email')) has-error @endif">
			<input type="email" name="email" class="form-control" placeholder="Email Address" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
			@endif
		</div>
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Mail</button>
	</form>

@endsection