<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\{
    SocialShareService,
    ScheduleParserService
};
use App\Models\{
    Post,
    User
};

class TestController extends Controller
{
    public function socialPost()
    {
        $schedules = ScheduleParserService::parseCurrentTime();
        dd($schedules);
    }
}
