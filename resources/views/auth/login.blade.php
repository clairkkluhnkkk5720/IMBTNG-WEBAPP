@extends('layouts.auth')

@section('page-title', 'Sign In')

@section('contents')

    <form action="{{ route('login.post') }}" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username or Email">
            <input type="password" class="form-control" placeholder="Enter Password">
            <a href="#" class="forgot-pass">Forget Password</a>
        </div>
        <div class="form-group submit-group">
            <a href="#" class="btn-common btn-red">Sign In</a>
            <!-- separator -->
            <div class="separator text-center">
                <p>or</p>
            </div>
            <p>Don't have an account yet? <a href="{{ route('register') }}">Sign Up</a></p>
        </div>
    </form>

@endsection
