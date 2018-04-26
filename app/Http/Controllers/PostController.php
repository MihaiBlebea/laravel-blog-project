<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function get(Post $post)
    {
        return $post;
    }

    public function store(PostFormRequest $request)
    {
        $post = Post::create([
            'category_id'   => $request->input('category_id'),
            'user_id'       => Auth::user()->id,
            'slug'          => str_slug($request->input('title'), '-'),
            'title'         => $request->input('title'),
            'feature_image' => $request->input('feature_image'),
            'content'       => $request->input('content'),
        ]);

        if($post)
        {
            return redirect()->back();
        }
    }

    public function update(Post $post)
    {
        $post->update([
            'category_id'   => $request->input('category_id'),
            'slug'          => str_slug($request->input('title'), '-'),
            'title'         => $request->input('title'),
            'feature_image' => $request->input('feature_image'),
            'content'       => $request->input('content'),
        ]);
    }

    public function delete(Post $post)
    {
        $comments = $post->comments;
        foreach($comments as $comment)
        {
            $comment->delete();
        }
        $post->delete();
    }
}
