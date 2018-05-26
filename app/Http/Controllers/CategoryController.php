<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Storage;
use App\services\ImageService;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories')->with('categories', $categories);
    }

    public function get()
    {
        //
    }

    public function getStore()
    {
        return view('category.create');
    }

    public function postStore(CategoryFormRequest $request)
    {
        // $image = ImageService::store($request->file('cover_image'));

        Category::create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'image_id'    => $request->input('cover_image'),
        ]);

        return redirect()->back();
    }

    public function getUpdate(Category $category)
    {
        return view('category.update')->with('category', $category);
    }

    public function postUpdate(CategoryFormRequest $request, Category $category)
    {
        $category->update([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'image_id'    => $request->input('cover_image'),
        ]);

        return redirect()->route('category.index');
    }

    public function delete(Category $category)
    {
        if($category->posts()->count() == 0)
        {
            $category->delete();
        }
        return redirect()->route('category.index');
    }
}
