<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Social;
use Socialite;
use Auth;

class SocialiteAuthController extends Controller
{
    public function redirectToProvider(String $driver_name)
    {
        return Socialite::driver($driver_name)
                            // ->scopes(['w_share'])
                            ->redirect();
    }

    public function handleProviderCallback(String $driver_name)
    {
        $social_user = Socialite::driver($driver_name)->user();
        $split_name = Social::splitName($social_user->name);
    
        // Get or create User model
        $user = User::firstOrCreate([
            'email' => $social_user->getEmail()
        ], [
            'role_id'            => 4,
            'first_name'         => $split_name[0],
            'last_name'          => $split_name[1]
        ]);

        // Update or create Social model
        $social = Social::updateOrCreate([
            'user_id' => $user->id
        ], [
            $driver_name . '_token' => $social_user->token
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }

}
