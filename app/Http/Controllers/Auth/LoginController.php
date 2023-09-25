<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
        dd($user);

        $this->_registerOrLoginUser($user);

        return redirect()->route(route: 'home');
    }

    //Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver(driver: 'facebook')->redirect();
    }

    //Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver(driver: 'facebook')->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route(route:'home');
    }


    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first(); 
        if(!$user){
            $user = new User();
            $user->first_name = $user['given_name'];
            $user->last_name = $user['family_name'];
            $user->phone = $data->phone;
            $user->provider_id = $data->id;
            $user->save();
        }

        Auth::login($user);
    }
}
