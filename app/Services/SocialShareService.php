<?php

namespace App\Services;

use App\Interfaces\SocialShareServiceInterface;
use Happyr\LinkedIn\LinkedIn;
use Twitter;
use App\Models\{
    Post,
    User
};
use File;

class SocialShareService implements SocialShareServiceInterface
{
    private static function urlToPost($category_slug, $post_slug)
    {
        return '/blog/' . $category_slug . '/' . $post_slug;
    }

    public static function shareLinkedin(Post $post, User $user = null)
    {
        if($user == null)
        {
            $user = auth()->user();
        }
        $linkedIn = new LinkedIn(config('linkedin.api_key'), config('linkedin.api_secret'));
        $linkedIn->setAccessToken($user->social->linkedin_token);

        $options = [ "json" =>
            [
                "comment" => 'Check my new article',
                "content" => [
                    "title" => $post->title,
                    "description" => $post->except(),
                    "submitted-url" => self::urlToPost($post->category->slug, $post->slug),
                    "submitted-image-url" => public_path($post->image->path ?? null)
                ],
                "visibility" => [
                    "code" => "anyone"
                ]
            ]
        ];

        $result = $linkedIn->post('v1/people/~/shares', $options);

        return $result;
    }

    public static function shareTwitter(Post $post, User $user = null)
    {
        if($user == null)
        {
            $user = auth()->user();
        }
        $client_tokens = $user->hasSocialToken('twitter');
        if(!$client_tokens)
        {
            throw new \Exception("User doesn't have linked Twitter account", 1);
        }
        $request_token = [
            'consumer_key'    => config('services.twitter.client_id'),
            'consumer_secret' => config('services.twitter.client_secret'),
			'token'           => $client_tokens->token,
			'secret'          => $client_tokens->token_secret,
		];

		Twitter::reconfig($request_token);

        // Check if post has image
        if($post->image)
        {
            $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($post->image->path))]);
    	    $result = Twitter::postTweet([
                'status' => 'Laravel is beautiful',
                'media_ids' => $uploaded_media->media_id_string
            ]);
        } else {
            $result = Twitter::postTweet(['status' => 'Laravel is beautiful', 'format' => 'json']);
        }

        return $result;
    }

    public static function shareFacebook(Post $post, User $user = null)
    {
        //
        return true;
    }
}
