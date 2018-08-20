<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use App\Models\{
    Post,
    Schedule
};

class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedules')->with([
            'schedules' => auth()->user()->schedules()->oldest('publish_datetime')->paginate(20)
        ]);
    }

    public function getStore()
    {
        if(auth()->user()->socialTokens->count() > 0)
        {
            return view('schedules.create')->with([
                'posts'    => Post::all(),
                'channels' => auth()->user()->socialTokens
            ]);
        } else {
            return view('admin.social-tokens');
        }
    }

    public function postStore(ScheduleRequest $request)
    {
        $schedule = Schedule::create([
            'user_id'          => auth()->user()->id,
            'post_id'          => $request->input('post'),
            'social_token_id'  => $request->input('channel'),
            'publish_datetime' => $request->input('datetime')
        ]);

        if($schedule)
        {
            return redirect()->back()->with([
                'message'     => 'Your schedule was saved',
                'alert_class' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message'     => 'Sorry! Something went wrong. Please try again',
                'alert_class' => 'danger'
            ]);
        }
    }
}
