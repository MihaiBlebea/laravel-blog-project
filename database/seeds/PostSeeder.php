<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    private $posts = [
        [
            'category_id' => 1,
            'user_id' => 1,
            'title' => 'How to master js?',
            'feature_image' => '',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ],
        [
            'category_id' => 2,
            'user_id' => 1,
            'title' => 'How to master PHP?',
            'feature_image' => '',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ],
        [
            'category_id' => 3,
            'user_id' => 1,
            'title' => 'How to master Dev Ops?',
            'feature_image' => '',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]
    ];

    public function run()
    {
        foreach($this->posts as $post)
        {
            Post::create([
                'category_id'   => $post['category_id'],
                'user_id'       => $post['user_id'],
                'slug'          => str_slug($post['title'], '-'),
                'title'         => $post['title'],
                'feature_image' => $post['feature_image'],
                'content'       => $post['content'],
            ]);
        }
    }
}
