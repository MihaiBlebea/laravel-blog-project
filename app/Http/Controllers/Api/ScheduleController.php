<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Category
    Post,
};

class ScheduleController extends Controller
{
    public function getPostsByCategory(Request $request, Category $category)
    {
        dd(Category::find($category->id));
    }
}
