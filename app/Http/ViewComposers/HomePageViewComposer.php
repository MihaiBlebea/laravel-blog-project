<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Post;

class HomePageViewComposer
{
    public function compose(View $view)
    {
        $posts = Post::where('published', true)->paginate(10);
        $view->with('posts', $posts);
    }
}
