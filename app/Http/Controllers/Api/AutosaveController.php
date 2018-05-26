<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Profile,
    Post,
    Project
};


class AutosaveController extends Controller
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
}
