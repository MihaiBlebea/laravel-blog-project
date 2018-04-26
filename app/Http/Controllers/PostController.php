<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

    }

    public function get(Post $post)
    {
        dd($post);
    }

    public function store()
    {
        //
    }

    public function update(Post $post)
    {
        //
    }

    public function delete(Post $post)
    {

    }
}
