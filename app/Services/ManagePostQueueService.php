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
        // Needs fixing compare dates //
        $now = Carbon::now()->format('Y-m-d H:m') . ':00';
        $schedules = Schedule::where('publish_datetime', $now)->get();
        self::$queue = $schedules;

        return self::getInstance();
    }

    public static function processQueue()
    {
        foreach(self::$queue as $schedule)
        {
            $post = $schedule->post;
            $user = $schedule->user;

            if($schedule->channel === 'twitter')
            {
                SocialShareService::shareTwitter($post, $user);
            }

            if($schedule->channel === 'linkedin')
            {
                SocialShareService::shareLinkedin($post, $user);
            }

            // TODO Find better solution for testing
            if($schedule->channel === 'test')
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
