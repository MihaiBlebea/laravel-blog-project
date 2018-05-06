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
    public function index(User $user = null)
    {
        if($user == null)
        {
            $posts = Post::where('published', true)->paginate(10);
            $response = ['posts' => $posts];
        } else {
            $posts = $user->posts()->where('published', true)->paginate();
            $response = [
                'posts' => $posts,
                'user'  => $user
            ];
        }
        return view('admin.posts')->with($response);
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

    public function getStore()
    {
        return view('post.create')->with([
            'categories' => Category::all()
        ]);
    }

    public function postStore(PostFormRequest $request)
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
