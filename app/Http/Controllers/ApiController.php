<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Post,
    Project,
    Profile,
    Track
};


class ApiController extends Controller
{
    public function autosavePost(Request $request)
    {
        $post = Post::find($request->input('draft_id'))->update([
            'content' => $request->input('content')
        ]);

        return ($post) ? 200 : 400;
    }

    public function autosaveProject(Request $request)
    {
        $project = Project::find($request->input('draft_id'))->update([
            'description' => $request->input('description')
        ]);

        return ($project) ? 200 : 400;
    }

    public function autosaveProfile(Request $request)
    {
        $profile = Profile::find($request->input('draft_id'))->update([
            'description' => $request->input('description')
        ]);

        return ($profile) ? 200 : 400;
    }

    // Tracking chart functions
    public function getTrackingData(Request $request)
    {
        if($request->input('sort') == 'date')
        {
            $total = Track::total(Track::trackDate());
        } else {
            $total = Track::total(Track::trackPage());
        }
        return $total->sortBy(function($item, $key) {
            return $key;
        });
    }
}
