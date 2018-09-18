<?php

use Illuminate\Database\Seeder;
use App\Models\Page;


class PageTableSeeder extends Seeder
{
    private $pages = [
        [
            'name'      => 'About',
            'view'      => 'pages.page.about',
            'type'      => 'page',
            'published' => true
        ],
        [
            'name'      => 'Contact',
            'view'      => 'pages.page.contact',
            'type'      => 'page',
            'published' => true
        ],
        [
            'name'      => 'Home',
            'view'      => 'pages.page.home',
            'type'      => 'page',
            'published' => true
        ],
        [
            'name'      => 'Developers',
            'view'      => 'pages.landing.developers',
            'type'      => 'page',
            'published' => true
        ]
    ];

    public function run()
    {
        foreach($this->pages as $page)
        {
            Page::create([
                'name'      => $page['name'],
                'view'      => $page['view'],
                'published' => $page['published']
            ]);
        }
    }
}
