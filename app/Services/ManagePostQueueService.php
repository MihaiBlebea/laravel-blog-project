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
        $now = Carbon::now('Europe/London');
        $schedules = Schedule::where('publish_datetime', $now->startOfMinute())->get();
        self::$queue = $schedules;

        return self::getInstance();
    }

    public static function processQueue()
    {
        foreach(self::$queue as $schedule)
        {
            $post = $schedule->post;
            $user = $schedule->user;

            if($schedule->socialToken->channel === 'twitter')
            {
                SocialShareService::shareTwitter($post, $user);
            }

            if($schedule->socialToken->channel === 'linkedin')
            {
                SocialShareService::shareLinkedin($post, $user);
            }

            // TODO Find better solution for testing
            if($schedule->socialToken->channel === 'test')
            {
                SocialShareService::shareFake($post, $user);
            }

            self::markAsPosted($schedule);
        }
    }

    public static function markAsPosted(Schedule $schedule)
    {
        $schedule->update([
            'posted' => true
        ]);
    }

    public static function deletedSchedule(Schedule $schedule)
    {
        $schedule->delete();
    }

    public static function deletePosted()
    {
        $schedules = Schedule::where('posted', true)->get();
        foreach($schedules as $schedule)
        {
            self::deletedSchedule();
        }
    }
}
