<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Happyr\LinkedIn\LinkedIn;
use App\Models\Post;

class SocialShareController extends Controller
{
    public function shareLinkedin(Post $post)
    {
        $linkedIn = new LinkedIn(config('linkedin.api_key'), config('linkedin.api_secret'));
        $linkedIn->setAccessToken(auth()->user()->social->linkedin_token);

        $options = [ "json" =>
            [
                "comment" => 'Check my new article',
                "content" => [
                    "title" => $post->title,
                    "description" => $post->except(),
                    "submitted-url" => '/blog/' . $post->category->slug . '/' . $post->slug,
                    "submitted-image-url" => public_upload_path($post->feature_image)
                ],
                "visibility" => [
                    "code" => "anyone"
                ]
            ]
        ];

        $result = $linkedIn->post('v1/people/~/shares', $options);
    }
}
