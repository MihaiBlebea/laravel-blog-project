<?php

namespace App\Interfaces;

use App\Models\Post;
use JonathanTorres\MediumSdk\Medium;


interface MediumPublishServiceInterface
{
    public static function publish(Medium $medium, Post $post);
}
