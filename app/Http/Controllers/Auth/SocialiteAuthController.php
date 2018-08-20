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
    // Add token to the user without creating a new user in the database //
    public function addToken(String $driver_name)
    {
        $driver = Socialite::driver($driver_name);
        session([ 'addToken' => true ]);
        if($driver_name == 'linkedin')
        {
            $driver->scopes(['w_share']);
        }
        return $driver->redirect();
    }

    // Remove token from sign in user account //
    public function removeToken(String $driver_name)
    {
        $token = auth()->user()->socialTokens()->where('channel', $driver_name)->first();
        if($token)
        {
            // Remove schedules related to this social channel
            $schedules = $token->schedules;
            foreach($schedules as $schedule)
            {
                $schedule->delete();
            }
            $token->delete();
            return redirect()->back()->with([
                'message'     => 'Your social token for ' . lcfirst($driver_name) . ' was removed',
                'alert_class' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Social token for ' . lcfirst($driver_name) . ' could not be found'
        ]);
    }

    public function redirectToProvider(String $driver_name)
    {
        $driver = Socialite::driver($driver_name);
        if($driver_name == 'linkedin')
        {
            $driver->scopes(['w_share']);
        }

        return $driver->redirect();
    }

    public function handleProviderCallback(String $driver_name)
    {
        $social_user = Socialite::driver($driver_name)->user();
        $split_name = explode(' ', $social_user->name);

        // Check if the "addToken" flag is present in the session
        if(session()->has('addToken'))
        {
            SocialToken::updateOrCreate([
                'user_id'      => auth()->user()->id,
                'channel'      => $driver_name
            ], [
                'token'        => $social_user->token,
                'token_secret' => isset($social_user->tokenSecret) ? $social_user->tokenSecret : null,
            ]);
            return redirect()->route('schedule.social-tokens')->with([
                'message'     => 'Social channel was added to your account',
                'alert_class' => 'success'
            ]);
        }

        // Get or create User model
        $user = User::firstOrCreate([
            'email' => $social_user->getEmail()
        ], [
            'role_id'    => 4,
            'first_name' => $split_name[0],
            'last_name'  => $split_name[1]
        ]);

        // Check if user already has this social_token
        SocialToken::updateOrCreate([
            'user_id'      => $user->id,
            'channel'      => $driver_name
        ], [
            'token'        => $social_user->token,
            'token_secret' => isset($social_user->tokenSecret) ? $social_user->tokenSecret : null,
        ]);

        Auth::login($user);
        return redirect(config('auth.redirect_after_login'));
    }

}
