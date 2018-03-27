@extends('layouts.auth')

@section('page-title', 'Reset Password')

@section('contents')

    <form action="{{ route('password.reset.post') }}" method="POST">
        <div class="form-group">
            <input type="email" name="email" class="form-control @if ($errors->has('email')) has-error @endif" value="{{ $email or old('email') }}" placeholder="Email Address">
            @if ($errors->has('email'))
                <small class="text-danger help-block">{{ $errors->first('email') }}</small>
            @endif
            <input type="password" name="password" class="form-control @if ($errors->has('password')) has-error @endif" placeholder="Password">
            @if ($errors->has('password'))
                <small class="text-danger help-block">{{ $errors->first('password') }}</small>
            @endif
            <input type="text" name="password_confirmation" class="form-control @if ($errors->has('password_confirmation')) has-error @endif" placeholder="Confirm Password">
            @if ($errors->has('password_confirmation'))
                <small class="text-danger help-block">{{ $errors->first('password_confirmation') }}</small>
            @endif
        </div>
        <div class="form-group submit-group">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <button type="submit" class="btn-common btn-red" style="display: block; width: 100%; outline: none;">RESET PASSWORD</button>
        </div>
    </form>

@endsection