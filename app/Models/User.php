<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\{
    HasRoleTrait,
    SearchableTrait
};
use App\Models\{
    Post,
    // Social,
    Search,
    Profile,
    Image,
    Schedule,
    SocialToken
};
use Jrean\UserVerification\Traits\UserVerification;


class User extends Authenticatable
{
    use Notifiable, HasRoleTrait, SearchableTrait, UserVerification;

    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'verified',
        'verification_token'
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

    // Relationship
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function social()
    // {
    //     return $this->hasOne(Social::class);
    // }

    public function searches()
    {
        return $this->hasMany(Search::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function socialTokens()
    {
        return $this->hasMany(SocialToken::class);
    }

    // Custom methods
    public function hasGitHub()
    {
        return isset($this->social->github_token);
    }

    public function getGitHubToken()
    {
        return ($this->hasGitHub()) ? $this->social->github_token : null;
    }

    public function hasPosts()
    {
        return ($this->posts->count() > 0) ? true : false;
    }

    public function hasProjects()
    {
        return ($this->projects->count() > 0) ? true : false;
    }

    public function hasSocialToken(String $channel_name)
    {
        $channel = $this->socialTokens()->where('channel', $channel_name)->first();
        return ($channel) ? $channel : false;
    }
}
