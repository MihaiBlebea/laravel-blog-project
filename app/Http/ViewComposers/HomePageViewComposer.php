<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class HomePageViewComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}
