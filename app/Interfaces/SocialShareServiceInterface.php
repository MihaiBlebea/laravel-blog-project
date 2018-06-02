<?php

namespace App\Interfaces;

use App\Models\{
    Post,
    User
};

interface SocialShareServiceInterface
{
    public static function shareLinkedin(Post $post, User $user = null);

    public static function shareTwitter(Post $post, User $user = null);

    public static function shareFacebook(Post $post, User $user = null);
}
