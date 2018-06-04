<?php

namespace App\Services;

use App\Interfaces\ManagePostQueueServiceInterface;
use Carbon\Carbon;
use App\Models\{
    Schedule
};
use App\Services\SocialShareService;


class ManagePostQueueService implements ManagePostQueueServiceInterface
{
    private static $_instance = null;

    private static $queue;


    private static function getInstance()
    {
        if(self::$_instance === null)
		{
           self::$_instance = new self;
        }
        return self::$_instance;
    }

    public static function createQueue()
    {
        $date = Carbon::now();
        $schedules = Schedule::where('date', $date->format('Y-m-d'))
                             ->where('hour', $date->hour)
                             ->where('minute', $date->minute)->get();
        self::$queue = $schedules;

        return self::getInstance();
    }

    public static function processQueue()
    {
        foreach(self::$queue as $schedule)
        {
            $post = $schedule->post;
            $user = $schedule->user;

            if($schedule->channel == 'twitter')
            {
                SocialShareService::shareTwitter($post, $user);
            }

            if($schedule->channel == 'linkedin')
            {
                SocialShareService::shareLinkedin($post, $user);
            }

            // TODO Find better solution for testing
            if($schedule->channel == 'test')
            {
                SocialShareService::shareFake($post, $user);
            }
        }
    }
}
