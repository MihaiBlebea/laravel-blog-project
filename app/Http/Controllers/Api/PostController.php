<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    User
};

class PostController extends Controller
{
    public function getUserPosts(User $user)
    {
        return $user->posts()->where('status', 'published')->get();
    }
}
