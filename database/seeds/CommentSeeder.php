<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    private $comments = [
        [
            'user_id'   => 1,
            'post_id'   => 1,
            'parent_id' => null,
            'subject'   => 'Hello',
            'content'   => 'How are you?'
        ],
        [
            'user_id'   => 2,
            'post_id'   => 1,
            'parent_id' => 1,
            'subject'   => 'Hello',
            'content'   => 'How are you?'
        ]
    ];

    public function run()
    {
        foreach($this->comments as $comment)
        {
            Comment::create([
                'user_id'   => $comment['user_id'],
                'post_id'   => $comment['post_id'],
                'parent_id' => $comment['parent_id'],
                'subject'   => $comment['subject'],
                'content'   => $comment['content'],
            ]);
        }
    }
}
