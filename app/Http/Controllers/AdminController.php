<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users')->with('users', $users);
    }

    public function posts()
    {
        $posts = Post::paginate(10);
        return view('admin.posts')->with('posts', $posts);
    }

    public function categories()
    {
        $categories = Category::paginate(10);
        return view('admin.categories')->with('categories', $categories);
    }

    public function comments()
    {
        $comments = Comment::paginate(10);
        return view('admin.comments')->with('comments', $comments);
    }
}
