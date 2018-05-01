<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Auth;

class SocialiteAuthController extends Controller
{
    public function redirectToProvider(String $driver_name)
    {
        return Socialite::driver($driver_name)->redirect();
    }

    public function handleProviderCallback(String $driver_name)
    {
        $social_user = Socialite::driver($driver_name)->user();
        $split_name = explode(' ', $social_user->name);

        $user = User::firstOrCreate([
            'email' => $social_user->getEmail()
        ], [
            'role_id'            => 4,
            'first_name'         => $split_name[0],
            'last_name'          => $split_name[1],
            'social_login_token' => $social_user->token,
            'profile_image'      => $social_user->getAvatar()
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }
}
