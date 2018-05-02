<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use GuzzleHttp\Client as Guzzle;
use App\Services\RepoService;
use Session;

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
        // Check if user has github token
        if(isset($user->social->github_token))
        {
            $url = Socialite::driver('github')->userFromToken($user->social->github_token)->user['repos_url'];
            $guzzle = new Guzzle();
            $service = new RepoService($guzzle, $url);
            $repos = $service->repos();

            return view('user.repos')->with([
                'user'  => $user,
                'repos' => $repos
            ]);
        }

        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Please link your GitHub account first. <a href="">Link GitHub</a>');

        return view('user.repos')->with([
            'user'    => $user,
            'repos'   => []
        ]);
    }
}
