<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.blog.blog')->with('categories', $categories);
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->where('published', true)->paginate(10);
        return view('pages.blog.category')->with([
            'posts'    => $posts,
            'category' => $category
        ]);
    }

    public function post(Category $category, Post $post)
    {
        return view('page.blog.post')->with('post', $post);
    }
}
