<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginPage ()
    {
    	return view('dashboard.auth.login');
    }

    public function login (Request $request)
    {
    	$this->validateLoginRequest($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse();
    }

    protected function validateLoginRequest (Request $request)
    {
        $username = $request->username;

        $key = $this->getLoginUsernameKey($request);

        $data = [
            $key       => $username,
            'password' => $request->password,
        ];

        $this->validate($request, [
            'username' => "required|string|min:6|exists:admins,{$key}",
            'password' => 'required|string|min:6|max:16',
        ], [
            'exists' => 'Username / Email not found in our database.',
        ]);
    }

    protected function attemptLogin (Request $request)
    {
        return auth()->guard('admin')->attempt(
            $this->getLoginCredentials($request),
            $request->filled('remember')
        );
    }

    protected function getLoginCredentials (Request $request)
    {
        return [
            $this->getLoginUsernameKey($request) => $request->username,
            'password'                           => $request->password,
        ];
    }

    protected function getLoginUsernameKey (Request $request)
    {
        return filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

    protected function sendLoginResponse (Request $request)
    {
        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    protected function sendFailedLoginResponse ()
    {
        return redirect()->back()->with(
            'global.error',
            'Username or password didn\'t match.'
        );
    }

    public function showResetLinkRequestPage ()
    {
    	return view('dashboard.auth.password.request');
    }

    public function showPasswordResetPage ($token)
    {
    	return view('dashboard.auth.password.reset');
    }

    public function sentResetLinkEmail (Request $request)
    {
    	// Send email & redirect to password reset page
    }

    public function resetPassword (Request $request)
    {
    	// reset user password
    }

    public function logout ()
    {
    	// logs out user
    }
}
