<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageService;
use App\Models\{
    User,
    Image
};


class ImageController extends Controller
{
    public function getUserImages(User $user)
    {
        return $images = $user->images;
    }

    public function storeUserImages(Request $request, User $user)
    {
        $image = ImageService::store($request->file('image-upload'), $user);
        if($image)
        {
            return 200;
        }
        return 404;
    }

    public function update(Request $request, Image $image)
    {
        $image->update([
            'name' => $request->input('name')
        ]);

        return 200;
    }

    public function delete(Image $image)
    {
        $image->delete();
        return 200;
    }
}
