<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\RelatedPostService;

class AboutPageViewComposer
{
    public function compose(View $view)
    {
        $view->with([
            'related_posts' => RelatedPostService::relatedPosts(3)
        ]);
    }
}
