<?php

namespace App\Services;

use App\Models\Post;
use App\Interfaces\RelatedPostServiceInterface;


class RelatedPostService implements RelatedPostServiceInterface
{
    public static function relatedPosts(Int $number = null)
    {
        if($number === null)
        {
            $number = 3;
        }
        return Post::inRandomOrder()->take($number)->get();
    }
}
