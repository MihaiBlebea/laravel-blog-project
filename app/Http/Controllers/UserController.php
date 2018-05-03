<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use GuzzleHttp\Client as Guzzle;
use App\Services\RepoService;
use Session;
use Auth;
use Socialite;

class UserController extends Controller
{
    public function get()
    {
        $user = Auth::user();
        return view('user.profile')->with('user', $user);
    }

    public function getUpdate()
    {
        $user = Auth::user();
        return view('user.update')->with('user', $user);
    }

    public function postUpdate(Request $request)
    {
        //
    }

    public function createPost()
    {
        $user = Auth::user();
        return view('post.create')->with([
            'user'       => $user,
            'categories' => Category::all()
        ]);
    }

    public function getPosts()
    {
        $user = Auth::user();
        return view('user.posts')
                ->with('user', $user)
                ->with('posts', $user->posts);
    }

    public function getRepos()
    {
        $user = Auth::user();
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

        // Session::flash('alert-class', 'alert-danger');
        // Session::flash('message', 'Please link your GitHub account first. <a href="">Link GitHub</a>');

        return view('user.repos')->with([
            'user'    => $user,
            'repos'   => []
        ]);
    }
}
