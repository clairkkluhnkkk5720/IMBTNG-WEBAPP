@extends('layouts.auth')

@section('page-title', 'Thank you')

@section('contents')

    {{-- <form action="{{ route('login.post') }}" method="POST">
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
    </form> --}}

    <p>
        Thank you for registering to imbting.com<br>
        A Verification mail is sent to <strong>{{ $user->email }}</strong><br>
        Please check the mail and visit the attached link to verify your email address.<br>
        Please note that you won't be able to login to your account without verifying your email.<br><br>

        <form method="POST" action="{{ route('verify.resend', $user->email) }}">
            <div class="form-group submit-group">
                <p>
                    Haven't received the email yet?
                    {{ csrf_field() }}
                    <button type="submit" class="btn-common btn-red" style="display: block; width: 100%; outline: none;">Resend Verification Mail</button>
                </p>
            </div>
        </form>
    </p>

@endsection
