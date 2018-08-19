<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Post,
    Category,
    User
};
use App\Services\RelatedPostService;
use App\Services\InsertLeadCardService;


class BlogController extends Controller
{
    // Display all posts based on some rules
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(10);
        return view('pages.blog.category')->with([
            'posts' => $posts,
            'categories' => Category::all()
        ]);
    }

    // Display the categories from witch to select
    public function blog()
    {
        $categories = Category::all();
        return view('pages.blog.blog')->with('categories', $categories);
    }

    // Display all posts from one category
    public function category(Category $category)
    {
        $posts = $category->posts()->where('status', 'published')->latest()->paginate(10);
        return view('pages.blog.category')->with([
            'posts'      => $posts,
            'categories' => Category::all(),
            'category'   => $category
        ]);
    }

    // Display all posts for a user
    public function userPosts(User $user)
    {
        $posts = $user->posts()->where('status', 'published')->latest()->paginate(10);
        return view('pages.blog.category')->with([
            'posts' => $posts,
            'user'  => $user
        ]);
    }

    // Display one specific post
    public function post(Category $category, Post $post)
    {
        return view('pages.blog.post')->with([
            'post' => $post,
            'related_posts' => RelatedPostService::relatedPosts(3)
        ]);
    }
}
