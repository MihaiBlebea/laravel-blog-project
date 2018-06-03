<?php

namespace App\Services;

use App\Interfaces\ScheduleParserServiceInterface;
use Carbon\Carbon;
use App\Models\{
    Post,
    Schedule
};

class ScheduleParserService implements ScheduleParserServiceInterface
{
    public static function queue()
    {
        //
    }

    private static function getCurrentTime()
    {
        $now = Carbon::now();
    }

    public static function parseCurrentTime()
    {
        $now = Carbon::now();
        $day = $now->format('N') - 1;
        $hour = intval($now->format('h'));
        $minute = intval($now->format('i'));
        return [
            'day'    => $day,
            'hour'   => $hour,
            'minute' => $minute
        ];
    }
}
