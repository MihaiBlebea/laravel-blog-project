<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    User,
    Schedule,
    Post,
    SocialToken
};
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function getUserSocialChannels(User $user)
    {
        return $user->socialTokens;
    }

    public function storeSchedule(Request $request, User $user)
    {
        // TODO validate data coming from Vue Component

        $post = Post::where('title', $request->input('name'))->first();
        $app_id = $request->input('id');

        // Transform date before saving in the database
        $date = Carbon::parse($request->input('date'));

        if($app_id == null)
        {
            Schedule::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'date'    => $date,
                'hour'    => $request->input('realHour'),
                'minute'  => $request->input('minute'),
                'channel' => $request->input('channel')
            ]);
        } else {
            $schedule = Schedule::find($app_id);
            $schedule->update([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'date'    => $date,
                'hour'    => $request->input('realHour'),
                'minute'  => $request->input('minute'),
                'channel' => $request->input('channel')
            ]);
        }
    }

    public function getUserSchedule(User $user)
    {
        return $user->schedules;
    }

    public function removeSchedule(Schedule $schedule)
    {
        $schedule->delete();
        return 200;
    }
}
