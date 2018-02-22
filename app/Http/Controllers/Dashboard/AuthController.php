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

    public function login ()
    {
    	// Logs in the admin user
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
