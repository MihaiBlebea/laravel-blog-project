<?php

namespace App\Interfaces;

use App\Models\{
    Schedule
};

interface ManagePostQueueServiceInterface
{
    public static function createQueue();

    public static function processQueue();

    public static function markAsPosted(Schedule $schedule);

    public static function deletedSchedule(Schedule $schedule);

    public static function deletePosted();
}
