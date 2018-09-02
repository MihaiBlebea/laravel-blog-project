<?php

namespace App\Services;

use App\Models\Post;
use JonathanTorres\MediumSdk\Medium;
use App\Interfaces\MediumPublishServiceInterface;


class MediumPublishService implements MediumPublishServiceInterface
{
    public static function publish(Medium $medium, Post $post)
    {
        $medium->connect(env('MEDIUM_TOKEN'));
        $user = $medium->getAuthenticatedUser();

        $uploaded_image_path = self::uploadImage($medium, $post);

        $data = [
            'title'         => $post->title,
            'contentFormat' => 'markdown',
            'content'       => self::concatMainImage($post->content, $uploaded_image_path),
            'publishStatus' => 'public',
        ];

        return $medium->createPost($user->data->id, $data);
    }

    private static function uploadImage(Medium $medium, Post $post)
    {
        $image = fopen($post->image->path, 'r');
        $uploaded_image = $medium->uploadImage($image, 'main-image.png');

        return $uploaded_image->data->url;
    }

    private static function concatMainImage(String $content, String $image_path)
    {
        return self::createMarkdownImage($image_path) . " \r\n " . $content;
    }

    private static function createMarkdownImage(String $image_path)
    {
        return '![main image](' . $image_path . ')';
    }
}
