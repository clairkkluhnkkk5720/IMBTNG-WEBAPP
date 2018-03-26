@extends('layouts.auth')

@section('page-title', 'Sign In')

@section('contents')

    <form action="{{ route('login.post') }}" method="POST">
        <div class="form-group">
            <input type="text" name="username" class="form-control @if ($errors->has('username')) has-error @endif" placeholder="Username or Email">
            @if ($errors->has('username'))
                <small class="text-danger help-block">{{ $errors->first('username') }}</small>
            @endif
            <input type="password" name="password" class="form-control @if ($errors->has('password')) has-error @endif" placeholder="Enter Password">
            @if ($errors->has('password'))
                <small class="text-danger help-block">{{ $errors->first('password') }}</small>
            @endif
            <a href="#" class="forgot-pass">Forget Password</a>
        </div>
        <div class="form-group submit-group">
            {{ csrf_field() }}
            <button type="submit" class="btn-common btn-red" style="display: block; width: 100%; outline: none">Sign In</button>
            <!-- separator -->
            <div class="separator text-center">
                <p>or</p>
            </div>
            <p>Don't have an account yet? <a href="{{ route('register') }}">Sign Up</a></p>
        </div>
    </form>

@endsection
