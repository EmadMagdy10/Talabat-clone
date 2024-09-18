<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function call_back($provider)
    {

        $provider_user = Socialite::driver($provider)->user();
        if ($provider_user) {
            $user = User::where('email', $provider_user->email)->first();
            $name = explode(' ', $provider_user->name);
            if ($user) {
                Auth::login($user);
                return redirect()->route('dashboard');
            } else if (!$user) {
                session([
                    'provider_user' => $provider_user,
                    'name' => $name
                ]);
                return redirect()->route('register');
            }
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Provider user data not found.']);
        }
    }
}
