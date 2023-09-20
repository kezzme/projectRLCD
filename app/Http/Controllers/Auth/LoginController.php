<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver(driver: 'google')->redirect();
    }

    //Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver(driver: 'google')->user();

        //$user->token;
    }

    //Facebook Login
    public function redirectFacebook()
    {
        return Socialite::driver(driver: 'facebook')->redirect();
    }

    //Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver(driver: 'facebook')->user();

        //$user->token;
    }
}
