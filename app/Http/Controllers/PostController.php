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
    // Get all user's post for admin panel
    public function index(User $user = null)
    {
        if($user == null)
        {
            $posts = Post::paginate(10);
            $response = ['posts' => $posts];
        } else {
            $posts = $user->posts()->paginate(10);
            $response = [
                'posts' => $posts,
                'user'  => $user
            ];
        }
        return view('admin.posts')->with($response);
    }

    // Get a specific post
    public function get(Post $post)
    {
        return $post;
    }

    // Publish a post
    public function togglePublish(Post $post)
    {
        $post->update([
            'published' => !$post->published,
        ]);
        return redirect()->back();
    }

    // Get the create post form page
    public function getStore()
    {
        return view('post.create')->with([
            'categories' => Category::all()
        ]);
    }

    // Send the payload to create a post
    public function postStore(PostFormRequest $request)
    {
        $path = Storage::disk('public_upload')->put('feature-images', $request->file('feature_image'));
        if(!$path)
        {
            throw new \Exception("Could Not Save The Imaage In The Storage", 1);
        };

        $post = Post::create([
            'category_id'   => $request->input('category_id'),
            'user_id'       => Auth::user()->id,
            'title'         => $request->input('title'),
            'feature_image' => $path,
            'content'       => $request->input('content'),
            'published'     => ($request->input('publish_mode') == 'publish') ? true : false
        ]);

        if($post)
        {
            return redirect()->back();
        }
    }

    // Get the post update form page
    public function getUpdate(Post $post)
    {
        return view('post.update')->with([
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    // Send the payload to upload a post
    public function postUpdate(PostFormRequest $request, Post $post)
    {
        if($request->file('feature_image'))
        {
            $path = Storage::disk('public_upload')->put('feature-images', $request->file('feature_image'));
            if(!$path)
            {
                throw new \Exception("Could Not Save The Imaage In The Storage", 1);
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
