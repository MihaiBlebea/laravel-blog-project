<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class ApiController extends Controller
{
    public function autosavePost(Request $request)
    {
        $post = Post::find($request->input('draft_id'))->update([
            'content' => $request->input('content')
        ]);

        return ($post) ? 200 : 400;
    }
}
