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
            'status' => ($post->status === 'draft') ? 'published' : 'draft',
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

    // Get the post update form page
    public function getUpdate(Post $post)
    {
        return view('post.update')->with([
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    // Send payload to store a new post
    public function postStore(PostFormRequest $request)
    {
        $post = Post::create([
            'user_id'     => auth()->user()->id,
            'category_id' => $request->input('category_id'),
            'title'       => $request->input('title'),
            'image_id'    => $request->input('feature_image'),
            'content'     => $request->input('content'),
        ]);

        return redirect()->back();
    }

    // Send the payload to upload a post
    public function postUpdate(PostFormRequest $request, Post $post)
    {
        $post->update([
            'category_id' => $request->input('category_id'),
            'title'       => $request->input('title'),
            'image_id'    => $request->input('feature_image'),
            'content'     => $request->input('content'),
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

        return redirect()->back();
    }
}
