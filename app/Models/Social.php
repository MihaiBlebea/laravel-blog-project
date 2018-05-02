<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Social extends Model
{
    protected $fillable = [
        'user_id',
        'facebook_token',
        'twitter_token',
        'linkedin_token',
        'github_token',
    ];

    // Relationship
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Custom methods
    public static function splitName(String $full_name)
    {
        return explode(' ', $full_name);
    }
}
