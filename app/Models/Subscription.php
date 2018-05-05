<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'subscribe_to'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscribed()
    {
        return $this->hasOne(User::class, 'id', 'subscribe_to');
    }

    public function setUserIdAttribute($value)
    {
        if($value !== $this->subscribe_to)
        {
            $this->attributes['user_id'] = $value;
        } else {
            throw new \Exception("User_id and subscribe_to must not be the same value", 1);
        }
    }

    public function setSubscribeToAttribute($value)
    {
        if($value !== $this->user_id)
        {
            $this->attributes['subscribe_to'] = $value;
        } else {
            throw new \Exception("User_id and subscribe_to must not be the same value", 1);
        }
    }
}
