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
    public function index(Request $request, User $user = null)
    {
        // Check if the user is set or not
        // If user is set display user's posts if not, display all posts
        // dd($request->all());
        $response = [];
        if($user == null)
        {
            $schema = Post::query();
        } else {
            $schema = $user->posts();
            $response['user'] = $user;
        }

        if($request->input('category'))
        {
            $schema->where('category_id', $request->input('category'));
            $response['category'] = Category::find($request->input('category'));
        }

        // Check if the status param is set
        if($request->input('status') && $request->input('status') !== 'all')
        {
            $schema->where('status', $request->input('status'));
            $response['status'] = $request->input('status');
        }

        $posts = $schema->paginate(10);
        $response['posts'] = $posts;
        $response['categories'] = Category::all();

        return view('admin.posts')->with($response);
    }

    // Get a specific post
    public function preview(Post $post)
    {
        return view('pages.blog.post')->with('post', $post);
    }

    // Publish a post
    public function togglePublish(Post $post)
    {
        $post->update([
            'status' => ($post->status == 'draft') ? 'published' : 'draft',
        ]);
        return redirect()->back();
    }

    // Get the create post form page
    public function getStore()
    {
        // Find the first category
        $first_category = Category::first();

        // Generate random slug
        $post = Post::create([
            'slug'        => str_random(10),
            'category_id' => ($first_category) ? $first_category->id : 0,
            'user_id'     => auth()->user()->id
        ]);

        // Redirect to upload page with the new generated slug
        return redirect()->route('post.draft', ['post' => $post->slug]);
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
            // 'slug'          => str_slug($request->input('title'), '-'),
            'title'         => $request->input('title'),
            'feature_image' => ($path) ? $path : null,
            'intro'         => $request->input('intro'),
            'content'       => $request->input('content'),
        ]);

        return redirect()->route('post.index', ['user' => auth()->user()->slug]);
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
