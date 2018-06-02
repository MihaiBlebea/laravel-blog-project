<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SocialShareService;
use App\Models\{
    Post,
    User
};

class PostToSocialChannel extends Command
{
    protected $signature = 'social:post {channel}';

    protected $description = 'Post post to social channel';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $channel_name = $this->argument('channel');

        $post = Post::find(1);
        $user = User::find(1);

        if($channel_name == 'twitter')
        {
            $result = SocialShareService::shareTwitter($post, $user);
        }

        if($channel_name == 'linkedin')
        {
            $result = SocialShareService::shareLinkedin($post, $user);
        }

        $this->info(json_encode($result));

    }
}
