<?php

namespace App\Interfaces;

interface RelatedPostServiceInterface
{
    public static function relatedPosts(Int $number = null);
}
