<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;


class ImageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if($user->hasRole('admin'))
        {
            $images = Image::paginate(10);
        } else {
            $images = $user->images()->paginate(10);
        }
        return view('admin.images')->with('images', $images);
    }

    public function getImage(Image $image)
    {
        return view('images.image')->with('image', $image);
    }
}
