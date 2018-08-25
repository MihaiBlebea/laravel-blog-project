<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Post
};

class PostController extends Controller
{
    public function getAll()
    {
        return Post::where('status', 'published')->get();
    }
}
