<?php

use Illuminate\Database\Seeder;
use App\Models\Language;


class LanguageTableSeeder extends Seeder
{
    private $languages = [
        [
            'name'             => 'Javascript',
            'percentage'       => 80,
            'experience_years' => '4'
        ],
        [
            'name'             => 'PHP',
            'percentage'       => 80,
            'experience_years' => '4'
        ],
        [
            'name'             => 'Python',
            'percentage'       => 20,
            'experience_years' => '0.5'
        ],
        [
            'name'             => 'Javascript - React',
            'percentage'       => 60,
            'experience_years' => '2'
        ]
    ];

    public function run()
    {
        foreach($this->languages as $language)
        {
            Language::create([
                'name'             => $language['name'],
                'percentage'       => $language['percentage'],
                'experience_years' => $language['experience_years'],
            ]);
        }
    }
}
