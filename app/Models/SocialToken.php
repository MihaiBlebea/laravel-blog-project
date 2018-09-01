<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User
};

class SocialToken extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'token_secret',
        'channel'
    ];

    private static $channels = ['twitter', 'linkedin', 'github', 'facebook'];

    public static function getDefaultChannels()
    {
        return self::$channels;
    }

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
