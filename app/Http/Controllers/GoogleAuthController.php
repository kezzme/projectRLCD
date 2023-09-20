<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
{
    try {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            $user = User::create([
                'first_name' => $googleUser->getFirstName(),
                'last_name' => $googleUser->getLastName(),
                'google_id' => $googleUser->getId(),
            ]);
        }

        Auth::login($user);

        return redirect()->intended('home');

    } catch (\Throwable $th) {
        Log::error('Google login error: ' . $th->getMessage());

        return redirect()->route('login')->with('error', 'Something went wrong during Google login.');
    }
}

}
