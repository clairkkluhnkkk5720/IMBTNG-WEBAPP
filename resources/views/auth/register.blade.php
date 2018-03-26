@extends('layouts.auth')

@section('page-title', 'Sign In')

@section('contents')

    <form action="{{ route('register.post') }}" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Full Name"></input>
            <input type="email" class="form-control" placeholder="Email"></input>
            <input type="text" class="form-control" placeholder="Username">
            <input type="password" class="form-control" placeholder="Password">
            <input type="password" class="form-control" placeholder="Confirm Password">
            <input type="text" class="form-control" placeholder="BTC Wallet Address">
        </div>
        <div class="form-group submit-group">
            <a href="#" class="btn-common btn-red">REGISTER</a>
            <!-- separator -->
            <div class="separator text-center">
                <p>or</p>
            </div>
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </form>

@endsection
