<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use GuzzleHttp\Client as Http;

class UserController extends Controller
{
    public function get(User $user)
    {
        return view('user.profile')->with('user', $user);
    }

    public function getUpdate(User $user)
    {
        return view('user.update')->with('user', $user);
    }

    public function postUpdate(Request $request)
    {
        //
    }

    public function getPosts(User $user)
    {
        return view('user.posts')
                ->with('user', $user)
                ->with('posts', $user->posts);
    }

    public function getRepos(User $user)
    {
        $social_user = Socialite::driver('github')->userFromToken($user->social_login_token);
        dd($social_user->user['repos_url']);
        $client = new Http();
        $res = $client->request('GET', $social_user->user['repos_url']);
echo $res->getStatusCode();
// "200"

// 'application/json; charset=utf8'
dd($res->getBody());
        return view('user.repos')->with('user', $user);
    }
}
