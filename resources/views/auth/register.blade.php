@extends('layouts.auth')

@section('page-title', 'Sign In')

@section('contents')

    <form action="{{ route('register.post') }}" method="POST">
        <div class="form-group">
            <input type="text" name="name" class="form-control @if ($errors->has('name')) has-error @endif" placeholder="Full Name" required>
            @if ($errors->has('name'))
                <small class="help-block text-danger">{{ $errors->first('name') }}</small>
            @endif
            <input type="email" name="email" class="form-control @if ($errors->has('email')) has-error @endif" placeholder="Email" required>
            @if ($errors->has('email'))
                <small class="help-block text-danger">{{ $errors->first('email') }}</small>
            @endif
            <input type="text" name="username" class="form-control @if ($errors->has('username')) has-error @endif" placeholder="Username" required>
            @if ($errors->has('username'))
                <small class="help-block text-danger">{{ $errors->first('username') }}</small>
            @endif
            <input type="tel" name="phone" class="form-control @if ($errors->has('phone')) has-error @endif" placeholder="Phone" required>
            @if ($errors->has('phone'))
                <small class="help-block text-danger">{{ $errors->first('phone') }}</small>
            @endif
            <input type="password" name="password" class="form-control @if ($errors->has('password')) has-error @endif" placeholder="Password" required>
            @if ($errors->has('password'))
                <small class="help-block text-danger">{{ $errors->first('password') }}</small>
            @endif
            <input type="url" name="wallet" class="form-control @if ($errors->has('wallet')) has-error @endif" placeholder="BTC Wallet Address" required>
            @if ($errors->has('wallet'))
                <small class="help-block text-danger">{{ $errors->first('wallet') }}</small>
            @endif
        </div>
        <div class="form-group submit-group">
            {{ csrf_field() }}
            <button type="submit" class="btn-common btn-red" style="display: block; outline: none; width: 100%;">REGISTER</button>
            <!-- separator -->
            <div class="separator text-center">
                <p>or</p>
            </div>
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </form>

@endsection
