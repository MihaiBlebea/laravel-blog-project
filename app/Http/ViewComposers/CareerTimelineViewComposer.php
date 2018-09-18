<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Job;


class CareerTimelineViewComposer
{
    public function compose(View $view)
    {
        $view->with([
            'jobs' => Job::orderBy('start_date', 'desc')->get()
        ]);
    }
}
