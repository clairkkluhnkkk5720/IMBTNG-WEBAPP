@extends('layouts.auth')

@section('page-title', 'Password Reset')

@section('contents')

    <form action="{{ route('password.email') }}" method="POST">
        <div class="form-group">
            <input type="email" name="email" class="form-control @if ($errors->has('email')) has-error @endif" placeholder="Email Address">
            @if ($errors->has('email'))
                <small class="text-danger help-block">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="form-group submit-group">
            {{ csrf_field() }}
            <button type="submit" class="btn-common btn-red" style="display: block; width: 100%; outline: none;">Send Reset Link</button>
        </div>
    </form>

@endsection