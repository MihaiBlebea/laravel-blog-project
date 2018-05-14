<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'short_description',
        'description',
        'profile_image'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
