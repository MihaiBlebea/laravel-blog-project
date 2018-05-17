<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialShareService;
use App\Models\Post;

class SocialShareController extends Controller
{
    public function share(String $driver, Post $post)
    {
        $function = 'share' . ucfirst($driver);
        if(SocialShareService::$function($post))
        {
            return redirect()->back();
        }
    }
}
