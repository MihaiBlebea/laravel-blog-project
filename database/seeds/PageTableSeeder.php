<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageTableSeeder extends Seeder
{
    private $pages = [
        [
            'name'      => 'About page',
            'content'   => 'asdasdasdada',
            'published' => true
        ],
        [
            'name'      => 'Contact page',
            'content'   => 'asdasdasdada',
            'published' => true
        ],
        [
            'name'      => 'Home page',
            'content'   => 'asdasdasdada',
            'published' => true
        ]
    ];

    public function run()
    {
        foreach($this->pages as $page)
        {
            Page::create([
                'name'      => $page['name'],
                'content'   => $page['content'],
                'published' => $page['published']
            ]);
        }
    }
}
