<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    private $comments = [
        [
            'post_id'   => 1,
            'parent_id' => null,
            'subject'   => 'Hello',
            'content'   => 'How are you?'
        ],
        [
            'post_id'   => 1,
            'parent_id' => 1,
            'subject'   => 'Hello',
            'content'   => 'How are you?'
        ],
        [
            'post_id'   => 1,
            'parent_id' => 1,
            'subject'   => 'Hello there',
            'content'   => 'I am the number 2 replay'
        ]
    ];

    public function run()
    {
        foreach($this->comments as $comment)
        {
            Comment::create([
                'post_id'   => $comment['post_id'],
                'parent_id' => $comment['parent_id'],
                'subject'   => $comment['subject'],
                'content'   => $comment['content'],
            ]);
        }
    }
}
