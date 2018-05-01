<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerifyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function verify ($ec)
    {
    	$user = User::where('e_c', $ec)->firstOrFail();

    	$user->e_c = null;

        // $user->transactions()->create([
        //     'type'   => 1,
        //     'amount' => 2000,
        //     'details' => 'Deposit',
        // ]);

    	return $user->save()
    			? redirect()->route('login')->with(
    				'global.success',
    				'Email is successfully verified. Please login to continue.'
    			) : redirect()->route('login')->with(
    				'global.error',
    				'Couldn\'t verify email. Please try again.'
    			);
    }

    public function resend ($email)
    {
        $user = User::unverified()->where('email', $email)->firstOrFail();

        $user->sendEmailVerifyNotification($user->e_c);

        return back()->with(
            'global.success',
            'Verification mail is sent again.'
        );
    }
}
