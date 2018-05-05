<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchFormRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Search;
use Auth;

class SearchController extends Controller
{
    public function search(SearchFormRequest $request)
    {
        $results = [];
        if(strtolower($request->input('model')) == 'post')
        {
            $results = Post::search($request->input('search_term'));
        }

        if(strtolower($request->input('model')) == 'user')
        {
            $results = User::search($request->input('search_term'));
        }

        if(strtolower($request->input('model')) == 'repo')
        {
            $results = Repo::search($request->input('search_term'));
        }

        // Store search in the database
        Search::create([
            'user_id'       => Auth::user()->id,
            'term'          => $request->input('search_term'),
            'model'         => $request->input('model'),
            'results_count' => $results->count()
        ]);

        return view('search.results')->with([
            'results'     => $results,
            'search_term' => $request->input('search_term'),
            'model'       => $request->input('model')
        ]);
    }

}
