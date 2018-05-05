<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchFormRequest;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(SearchFormRequest $request)
    {
        $results = Post::search($request->input('search_term'));
        return view('search.results')->with('results', $results);
    }

}
