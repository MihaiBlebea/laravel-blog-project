<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    User,
    Schedule,
    Post
};

class ScheduleController extends Controller
{
    public function storeSchedule(Request $request, User $user)
    {
        foreach($request->all() as $appointment)
        {
            $post = Post::where('title', $appointment['name'])->first();
            $app_id = $appointment['id'];

            if($app_id == null)
            {
                Schedule::create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'date'    => $appointment['day'],
                    'hour'    => $appointment['hour'],
                    'minute'  => $appointment['minute'],
                    'channel' => $appointment['channel']
                ]);
            } else {
                $schedule = Schedule::find($app_id);
                $schedule->update([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'date'    => $appointment['day'],
                    'hour'    => $appointment['hour'],
                    'minute'  => $appointment['minute'],
                    'channel' => $appointment['channel']
                ]);
            }
        }
        return $request->all();
    }

    public function getUserSchedule(User $user)
    {
        return $user->schedules;
    }
}
