<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{
    User,
    Category
};

class HomePageViewComposer
{
    public function compose(View $view)
    {
        $user = User::find(1);
        $categories = Category::all();
        $view->with([
            'categories' => $categories,
            'user'       => $user,
            'projects'   => $user->projects
        ]);
    }
}
