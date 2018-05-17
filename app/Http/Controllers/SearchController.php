<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchFormRequest;
use App\Models\Post;
use App\Models\Search;

class SearchController extends Controller
{
    public function search(SearchFormRequest $request)
    {
        $results = Post::search($request->input('search_term'));

        // Store search in the database
        Search::create([
            'user_id'       => auth()::user()->id,
            'term'          => $request->input('search_term'),
            'results_count' => $results->count()
        ]);

        return view('search.results')->with([
            'results'     => $results,
            'search_term' => $request->input('search_term')
        ]);
    }
}
