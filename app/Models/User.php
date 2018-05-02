<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasRoleTrait;
use App\Models\Post;
use App\Models\Social;

class User extends Authenticatable
{
    use Notifiable, HasRoleTrait;

    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'profile_image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Mutators
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Relationship
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function social()
    {
        return $this->belongsTo(Social::class);
    }
}
