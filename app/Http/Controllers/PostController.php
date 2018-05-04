<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use App\Http\Requests\PostFormRequest;
use Carbon\Carbon;
use Storage;

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

    public function publish(Post $post)
    {
        $post->update([
            'published' => true,
            'publish_at' => Carbon::now()
        ]);
        return redirect()->back();
    }

    public function store(PostFormRequest $request)
    {
        $path = Storage::disk('public_upload')->put('feature-images', $request->file('feature_image'));
        if(!$path)
        {
            return false;
        };

        $post = Post::updateOrCreate([
            'category_id'   => $request->input('category_id'),
            'user_id'       => Auth::user()->id,
            'title'         => $request->input('title'),
            'feature_image' => $path,
            'content'       => $request->input('content'),
        ]);

        // Storage::delete($path);

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
