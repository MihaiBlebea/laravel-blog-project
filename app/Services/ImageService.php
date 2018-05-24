<?php

namespace App\Services;

use App\Interfaces\ImageServiceInterface;
use App\Models\{
    Image,
    User
};
use Storage;


class ImageService implements ImageServiceInterface
{
    private static $folder = 'uploads';

    private static $file_name = null;

    public static function as(String $file_name)
    {
        self::$file_name = $file_name;
    }

    public static function store($file, User $user = null)
    {
        if(self::$file_name == null)
        {
            $path = Storage::disk('public')->putFile(self::$folder, $file);
            self::$file_name = str_before($file->hashName(), '.');
        } else {
            $path = Storage::disk('public')->putFileAs(self::$folder, $file, self::$file_name);
        }

        if(!$path)
        {
            throw new \Exception('The cover image could not be saved to storage' , 1);
        };

        if($user == null && !auth()->check())
        {
            throw new \Exception('You must be logged in to upload an image' , 1);
        }

        $image = Image::create([
            'user_id' => auth()->user()->id ?? $user->id,
            'name' => self::$file_name,
            'path' => $path
        ]);
        return $image;
    }
}
