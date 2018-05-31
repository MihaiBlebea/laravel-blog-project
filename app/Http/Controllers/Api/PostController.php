<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    User,
    Schedule,
    Post
};

class PostController extends Controller
{
    public function getUserPosts(User $user)
    {
        return $user->posts;
    }

    public function storeSchedule(Request $request, User $user)
    {
        foreach($request->all() as $days)
        {
            foreach($days['hours'] as $hour)
            {
                if(count($hour['appointments']) > 0)
                {
                    foreach($hour['appointments'] as $appointment)
                    {
                        $post = Post::where('title', $appointment['name'])->first();
                        Schedule::create([
                            'user_id' => $user->id,
                            'post_id' => $post->id,
                            'date'    => $appointment['day'],
                            'hour'    => $appointment['hour'],
                            'minute'  => $appointment['minute'],
                            'channel' => $appointment['channel']
                        ]);
                    }
                }
            }
        }
        return $request->all();
    }
}
