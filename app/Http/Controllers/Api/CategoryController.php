<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller
{
    public function getAll()
    {
        return Category::all();
    }

    public function getPosts(Category $category)
    {
        return $category->posts()->where('status', 'published')->get();
    }
}
