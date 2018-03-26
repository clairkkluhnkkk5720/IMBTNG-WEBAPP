@extends('layouts.auth')

@section('page-title', 'Thank you')

@section('contents')

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
