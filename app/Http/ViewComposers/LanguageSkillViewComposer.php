<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Language;


class LanguageSkillViewComposer
{
    public function compose(View $view)
    {
        $view->with([
            'languages' => Language::orderBy('percentage', 'desc')->get()
        ]);
    }
}
