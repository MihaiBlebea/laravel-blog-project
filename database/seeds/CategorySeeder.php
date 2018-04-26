<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    private $categories = [
        [
            'name' => 'Front end'
        ],
        [
            'name' => 'Back end'
        ],
        [
            'name' => 'DevOps'
        ],
    ];

    public function run()
    {
        foreach($this->categories as $category)
        {
            Category::create([
                'slug' => str_slug($category['name'], '-'),
                'name' => $category['name']
            ]);
        }
    }
}
