<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    User,
    SocialToken
};
use Socialite;
use Auth;

class SocialiteAuthController extends Controller
{
    public function redirectToProvider(String $driver_name)
    {
        $driver = Socialite::driver($driver_name);
        if($driver_name == 'linkedid')
        {
            $driver->scopes(['w_share']);
        }
        return $driver->redirect();
    }

    public function handleProviderCallback(String $driver_name)
    {
        $social_user = Socialite::driver($driver_name)->user();
        $split_name = explode(' ', $social_user->name);

        // Get or create User model
        $user = User::firstOrCreate([
            'email' => $social_user->getEmail()
        ], [
            'role_id'    => 4,
            'first_name' => $split_name[0],
            'last_name'  => $split_name[1]
        ]);

        // Check if user already has this social_token
        if(!$user->hasSocialToken($driver_name))
        {
            SocialToken::create([
                'user_id'      => $user->id,
                'token'        => $social_user->token,
                'token_secret' => isset($social_user->tokenSecret) ? $social_user->tokenSecret : null,
                'channel'      => $driver_name
            ]);
        }

        Auth::login($user);
        return redirect(config('auth.redirect_after_login'));
    }

}
