<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User
};

class Schedule extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'date',
        'hour',
        'minute',
        'channel'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
