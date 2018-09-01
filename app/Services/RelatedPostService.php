<?php

namespace App\Services;

use App\Models\Post;
use App\Interfaces\RelatedPostServiceInterface;


class RelatedPostService implements RelatedPostServiceInterface
{
    public static $default_number = 3;

    public static function relatedPosts(Array $options)
    {
        $number = array_key_exists('number', $options) ? $options['number'] : self::$default_number;
        $posts = Post::query();

        if(array_key_exists('exclude', $options))
        {
            $posts->where('id', '!=', $options['exclude']);
        }

        return $posts->inRandomOrder()->take($number)->get();
    }
}
