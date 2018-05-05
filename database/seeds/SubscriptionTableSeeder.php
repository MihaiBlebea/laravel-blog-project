<?php

use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionTableSeeder extends Seeder
{
    private $subscriptions = [
        [
            'user_id'      => 1,
            'subscribe_to' => 3
        ],
        [
            'user_id'      => 1,
            'subscribe_to' => 2
        ],
        [
            'user_id'      => 1,
            'subscribe_to' => 2
        ]
    ];

    public function run()
    {
        foreach($this->subscriptions as $subscription)
        {
            Subscription::create([
                'user_id'      => $subscription['user_id'],
                'subscribe_to' => $subscription['subscribe_to']
            ]);
        }
    }
}
