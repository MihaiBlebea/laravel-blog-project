<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{
    User
};

class AboutPageViewComposer
{
    public function compose(View $view)
    {
        $user = User::find(1);
        $view->with([
            'projects' => $user->projects
        ]);
    }
}
