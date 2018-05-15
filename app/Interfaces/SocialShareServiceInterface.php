<?php

namespace App\Interfaces;

use App\Models\Post;

interface SocialShareServiceInterface
{
    public static function shareLinkedin(Post $post);

    public static function shareMedium(Post $post);

    public static function shareTwitter(Post $post);

    public static function shareFacebook(Post $post);
}
