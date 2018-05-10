<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Repo extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'full_name',
        'url',
        'language',
        'homepage',
        'description',
        'was_created'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
