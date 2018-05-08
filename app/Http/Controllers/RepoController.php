<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RepoService;
use App\Models\Repo;
use GuzzleHttp\Client as Guzzle;
use Socialite;


class RepoController extends Controller
{
    // Get user's repos
    public function index()
    {
        $github_token = auth()->user()->getGitHubToken();
        $user = Socialite::driver('github')->userFromToken($github_token);

        $client = new Guzzle();
        $service = new RepoService($client);

        return view('repo.index')->with('repos', $service->repos($user->user['repos_url']));
    }

    // Add a GitHub repo to user's projects
    public function addToUserProjects(Request $request)
    {
        $client = new Guzzle();
        $service = new RepoService($client);

        $repo = $service->repos($request->input('repo_url'));

        $project = Repo::create([
            'user_id' => auth()->user()->id,
            'name' => $repo['name'],
            'full_name' => $repo['full_name'],
            'url' => $repo['url'],
            'language' => $repo['language'],
            'homepage' => $repo['homepage'],
            'description' => $repo['description']
        ]);

        return redirect()->back();
    }

    // Remove a GitHub repo from user's projects
    public function removeFromUserProjects()
    {
        //
    }

    public function changeDescription(Request $request)
    {
        //
    }

    // Display all the user's projects
    public function projects(User $user = null)
    {
        //
    }

}
