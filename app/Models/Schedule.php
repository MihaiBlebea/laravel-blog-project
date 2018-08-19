<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Post,
    SocialToken
};

class Schedule extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'publish_datetime',
        'channel',
        'posted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function socialTokens()
    {
        return $this->belongsTo(SocialToken::class, 'channel');
    }
}
