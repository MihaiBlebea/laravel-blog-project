<?php

namespace App\Services;

use App\Interfaces\SocialShareServiceInterface;
use Happyr\LinkedIn\LinkedIn;
use JonathanTorres\MediumSdk\Medium;
use App\Models\Post;
use Twitter;
use Exception;
use File;

class SocialShareService implements SocialShareServiceInterface
{
    public static function shareLinkedin(Post $post)
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

        return true;
    }

    public static function shareMedium(Post $post)
    {
        $medium = new Medium();
        $medium->connect(auth()->user()->social->medium_token);

        // Store image on Medium and insert into post
        // TODO have a service to upload images
        // Find the curl method in helpers.php file
        $image_data = curl('http://167.99.88.74/uploads/feature-images/d5R5wqe0tGi29Bbcu0OLqcInToW0Qsp7ldiWaYV9.jpeg');
        $image = $medium->uploadImage($image_data, 'image-filename.jpeg');

        $user = $medium->getAuthenticatedUser();
        $data = [
            'title' => $post->title,
            'contentFormat' => 'html',
            'content' => '<img src="' . $image->data->url . '">' . $post->title,
            'publishStatus' => 'draft',
        ];

        $post = $medium->createPost($user->data->id, $data);

        return true;
    }

    public static function shareTwitter(Post $post)
    {
        $request_token = [
			'token'  => 'token',
			'secret' => 'token',
		];

		Twitter::reconfig($request_token);

        // Twitter::postTweet(['status' => 'Laravel is beautiful', 'format' => 'json']);

        $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path('filename.jpg'))]);
	    Twitter::postTweet([
            'status' => 'Laravel is beautiful',
            'media_ids' => $uploaded_media->media_id_string
        ]);

        return true;
    }

    public static function shareFacebook(Post $post)
    {
        //
        return true;
    }
}
