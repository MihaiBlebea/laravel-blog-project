<?php

use Illuminate\Database\Seeder;
use App\Models\Job;


class JobTableSeeder extends Seeder
{
    private $jobs = [
        [
            'company_name' => 'Start Marketing',
            'description'  => 'Small digital agency',
            'position'     => 'Full Stack Developer',
            'start_date'   => '2015-07-01',
            'end_date'     => '2017-07-01',
        ],
        [
            'company_name' => 'GIMO',
            'description'  => 'Digital agency',
            'position'     => 'Full stack web developer',
            'start_date'   => '2017-07-01',
            'end_date'     => '2017-11-29',
        ]
    ];

    public function run()
    {
        foreach($this->jobs as $job)
        {
            Job::create([
                'company_name' => $job['company_name'],
                'description'  => $job['description'],
                'position'     => $job['position'],
                'start_date'   => $job['start_date'],
                'end_date'     => $job['end_date'],
            ]);
        }
    }
}
