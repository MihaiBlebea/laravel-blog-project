<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'short_description',
        'description'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
