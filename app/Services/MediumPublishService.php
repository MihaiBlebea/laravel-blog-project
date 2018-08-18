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
        $data = [
            'title'         => $post->title,
            'contentFormat' => 'markdown',
            'content'       => $post->content,
            'publishStatus' => 'public',
        ];

        return $medium->createPost($user->data->id, $data);
    }
}
