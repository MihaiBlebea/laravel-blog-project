<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchFormRequest;
use App\Models\Post;
use App\Models\User;

class SearchController extends Controller
{
    public function search(SearchFormRequest $request)
    {
        $results = [];
        if(strtolower($request->input('model')) == 'post')
        {
            $posts = Post::search($request->input('search_term'));
            return view('search.results')->with([
                'posts' => $posts,
                'model' => $request->input('model')
            ]);
        }

        if(strtolower($request->input('model')) == 'user')
        {
            $users = User::search($request->input('search_term'));
            return view('search.results')->with([
                'users' => $users,
                'model' => $request->input('model')
            ]);
        }

        if(strtolower($request->input('model')) == 'repo')
        {
            $results = Repo::search($request->input('search_term'));
        }

    }

}
