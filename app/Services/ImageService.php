<?php

namespace App\Services;

use App\Interfaces\ImageServiceInterface;
use App\Models\Image;
use Storage;


class ImageService implements ImageServiceInterface
{
    private static $folder = 'uploads';

    public static function store($file, String $name = null)
    {
        if($name == null)
        {
            $path = Storage::disk('public')->putFile(self::$folder, $file);
            $name = str_before($file->hashName(), '.');
        } else {
            $path = Storage::disk('public')->putFileAs(self::$folder, $file, $name);
        }

        if(!$path)
        {
            throw new \Exception('The cover image could not be saved to storage' , 1);
        };

        if(!auth()->check())
        {
            throw new \Exception('You must be logged in to upload an image' , 1);
        }

        $image = Image::create([
            'user_id' => auth()->user()->id,
            'name' => $name,
            'path' => $path
        ]);
        return $image;
    }
}
