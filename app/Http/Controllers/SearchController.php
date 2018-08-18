<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchFormRequest;
use App\Models\{
    Post,
    Search
};
use App\Services\SearchLogService;


class SearchController extends Controller
{
    public function search(SearchFormRequest $request)
    {
        $results = Post::search($request->input('search_term'));

        // Log the search, create new or update the search count
        SearchLogService::logSearch($request->input('search_term'));

        return view('search.results')->with([
            'results'     => $results,
            'search_term' => $request->input('search_term')
        ]);
    }
}
