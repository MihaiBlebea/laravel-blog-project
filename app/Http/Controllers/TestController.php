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

        $result = SocialShareService::shareTwitter($post, $user);

        // $result = SocialShareService::shareLinkedin($post, $user);
        dd($result);
    }
}
