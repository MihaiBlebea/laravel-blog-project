<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{
    User,
    Category,
    Post
};

class HomePageViewComposer
{
    public function compose(View $view)
    {
        $user = User::find(1);
        $categories = Category::all();
        $posts = Post::where('status', 'published')->take(6)->get();
        $view->with([
            'categories' => $categories,
            'user'       => $user,
            'projects'   => $user->projects,
            'posts'      => $posts
        ]);
    }
}
