<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use GuzzleHttp\Client as Guzzle;
use App\Services\RepoService;

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
        $url = Socialite::driver('github')->userFromToken($user->social_login_token)->user['repos_url'];
        $guzzle = new Guzzle();
        $service = new RepoService($guzzle, $url);
        $repos = $service->repos();
        
        return view('user.repos')->with([
            'user'  => $user,
            'repos' => $repos
        ]);
    }
}
