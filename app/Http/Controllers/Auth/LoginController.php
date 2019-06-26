<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


//GOOGLE LOGIN API

    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {


        $userSocial = Socialite::driver('google')->user();
        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {

            Auth::loginUsingId($findUser->id);

        } else {

            $input = [];
            $input['email'] = $userSocial->email;
            $input['name'] = $userSocial->name;
            $input['password'] = bcrypt(Str::random(20));
            $input['email_verified_at'] = now();
            $registeredUser = User::create($input);
            Auth::loginUsingId($registeredUser->id);

        }

        return redirect('/home');

    }

    public function authenticated(Request $request, $user)
    {

        if (Auth::user()->role->id == 1 && Auth::check() && Auth::user()->role->name == 'boss') {

            return redirect('/admin-home');

        } elseif (Auth::user()->role->id == 2) {

            return redirect('/translator-home');

        } else {

            return redirect('/home');

        }

    }
}
