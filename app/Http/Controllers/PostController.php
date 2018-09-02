<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Post,
    Category,
    User
};
use App\Http\Requests\PostFormRequest;
use Carbon\Carbon;
use App;
use App\Services\MediumPublishService;


class PostController extends Controller
{
    // Get all user's post for admin panel
    public function index(Request $request)
    {
        // Check if the user is set or not
        // If user is set display user's posts if not, display all posts
        // dd($request->all());
        $response = [];
        $schema = Post::query();

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
            'status'      => $request->input('status')
        ]);

        if($post)
        {
            if($request->input('publish_medium'))
            {
                $medium = App::make(\JonathanTorres\LaravelMediumSdk\LaravelMediumSdk::class);
                $result = MediumPublishService::publish($medium, $post);
            }

            return redirect()->back()->with([
                'message'     => 'Post was saved',
                'alert_class' => 'success'
            ]);
        }

        return redirect()->back()->with([
            'message'     => 'Post was not saved',
            'alert_class' => 'danger'
        ]);
    }

    // Send the payload to upload a post
    public function postUpdate(PostFormRequest $request, Post $post)
    {
        $post->update([
            'category_id' => $request->input('category_id'),
            'title'       => $request->input('title'),
            'image_id'    => $request->input('feature_image'),
            'content'     => $request->input('content'),
            'status'      => $request->input('status')
        ]);

        if($request->input('publish_medium'))
        {
            $medium = App::make(\JonathanTorres\LaravelMediumSdk\LaravelMediumSdk::class);
            $result = MediumPublishService::publish($medium, $post);
        }

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

        return redirect()->back()->with([
            'message'     => 'Post was deleted',
            'alert_class' => 'success'
        ]);
    }
}
