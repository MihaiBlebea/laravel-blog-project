<?php

namespace App\Services;

use App\Interfaces\SearchLogServiceInterface;
use App\Models\Search;

class SearchLogService implements SearchLogServiceInterface
{
    public static function logSearch(String $term_name)
    {
        if(self::checkIfExists($term_name))
        {
            self::updateSearch($term_name);
        } else {
            self::createSearch($term_name);
        }
    }

    private static function checkIfExists(String $term_name)
    {
        $search = Search::where('term', $term_name)->first();
        return ($search) ? true : false;
    }

    private static function updateSearch(String $term_name)
    {
        $search = Search::where('term', $term_name)->first();
        $search->update([
            'results_count' => $search->results_count + 1
        ]);
    }

    private static function createSearch(String $term_name)
    {
        Search::create([
            'term'          => $term_name,
            'results_count' => 1
        ]);
    }
}
