<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasRoleTrait;
use App\Traits\SearchableTrait;
use App\Models\Post;
use App\Models\Social;
use App\Models\Search;
use App\Models\Subscription;

class User extends Authenticatable
{
    use Notifiable, HasRoleTrait, SearchableTrait;

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

    private static $search_fileds = [
        'first_name',
        'last_name',
        'email'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Mutators
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = $value;
        $this->attributes['slug'] = strtolower($value) . '-' . random(8);
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

    public function searches()
    {
        return $this->hasMany(Search::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // Custom methods
    public function hasGitHub()
    {
        return isset($this->social->github_token);
    }

    public function isSubscribed(User $user)
    {
        return (bool) $this->subscriptions()->where('subscribe_to', $user->id)->count();
    }
}
