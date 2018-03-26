<?php

namespace App\Http\Controllers\Auth;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register (Request $request)
    {
        $this->validateRequest($request);

        $user = $this->createUser($request);

        $user->sendEmailVerifyNotification($user->e_c);

        // return redirect($this->redirectPath())->with(
        //     'global.success',
        //     'A confirmation mail is sent to your email <strong>'. $user->email .'</strong>. Please confirm your email to Sign in to your profile.'
        // );

        return redirect()->route('register.thank-you', $user->email);
    }

    protected function validateRequest (Request $request)
    {
        $rules = [
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|string|min:5|max:16|unique:users,username',
            'phone'    => 'required|string|min:6|unique:users,phone',
            'password' => 'required|string|min:6|max:16',
            'wallet'   => 'required|url|unique:users,wallet',
        ];

        $this->validate($request, $rules);
    }

    protected function createUser (Request $request)
    {
        return User::create([
            'name'     => $request->input('name'),
            'email'    => $request->email,
            'username' => $request->username,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'wallet'   => $request->wallet,
            'e_c'      => $this->getUniqueEC(),
        ]);
    }

    protected function getUniqueEC ()
    {
        $ec = str_random(20);

        while (User::where('e_c', $ec)->first()) {
            $ec = str_random(20);
        }

        return $ec;
    }

    public function showThankYou ($email)
    {
        // $user = User::where([
        //     ['email', '=', $email],
        //     ['e_c' '!=', null],
        // ])->firstOrFail();

        $user = User::unverified()->where('email', $email)->firstOrFail();

        return view('auth.thank-you', compact('user'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
