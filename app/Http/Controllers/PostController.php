<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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

    public function userPosts(User $user)
    {
        $posts = $user->posts->where('published', true);
        return view('post.user-posts')->with([
            'user'  => $user,
            'posts' => $posts
        ]);
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

    public function getUpdate(Post $post)
    {
        return view('post.update')->with([
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function postUpdate(PostFormRequest $request, Post $post)
    {
        if($request->file('feature_image'))
        {
            $path = Storage::disk('public_upload')->put('feature-images', $request->file('feature_image'));
            if(!$path)
            {
                return false;
            };
        }

        $post->update([
            'category_id'   => $request->input('category_id'),
            'slug'          => str_slug($request->input('title'), '-'),
            'title'         => $request->input('title'),
            'feature_image' => ($path) ? $path : null,
            'content'       => $request->input('content'),
        ]);

        return redirect()->back();
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
