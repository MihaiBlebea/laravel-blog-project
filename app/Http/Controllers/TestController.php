<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialShareService;
use App\Models\{
    Post,
    User
};

class TestController extends Controller
{
    public function socialPost()
    {
        $post = Post::find(1);
        $user = User::find(1);

        if($channel_name == 'twitter')
        {
            $result = SocialShareService::shareTwitter($post, $user);
        }

        if($channel_name == 'linkedin')
        {
            $result = SocialShareService::shareLinkedin($post, $user);
        }

    }
}
