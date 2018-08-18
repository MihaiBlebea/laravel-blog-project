<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{
    Post
};

class AboutPageViewComposer
{
    public function compose(View $view)
    {
        $view->with([
            'related_posts' => Post::take(3)->get()
        ]);
    }
}
