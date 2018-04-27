<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        return view('layouts._blog')->with('posts', $posts);
    }
}
