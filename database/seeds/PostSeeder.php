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
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document without relying on meaningful content (also called greeking). Replacing the actual content with placeholder text allows designers to design the form of the content before the content itself has been produced.
                The lorem ipsum text is typically a scrambled section of De finibus bonorum et malorum, a 1st-century BC Latin text by Cicero, with words altered, added, and removed to make it nonsensical, improper Latin.
                A variation of the ordinary lorem ipsum text has been used in typesetting since the 1960s or earlier, when it was popularized by advertisements for Letraset transfer sheets. It was introduced to the Information Age in the mid-1980s by Aldus Corporation, which employed it in graphics and word-processing templates for its desktop publishing program PageMaker.'
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
