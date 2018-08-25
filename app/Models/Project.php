<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Image
};

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'short_description',
        'description',
        'languages',
        'link',
        'status'
    ];

    private static $languages = [
        'php',
        'javascript',
        'python',
        'go',
        'swift',
        'bash',
        'css'
    ];

    private static $statuses = [
        'published' => 'Publish',
        'draft'     => 'Save for later'
    ];

    protected $casts = [
        'languages' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'project_images')->withTimestamps();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value, '-');
    }

    // public function hasGallery()
    // {
    //     return (count($this->images) > 0) ? true : false;
    // }

    public function hasStatus(String $status)
    {
        return ($this->status === $status) ? true : false;
    }

    public function hasLanguage(String $language)
    {
        return ($this->language === $language) ? true : false;
    }

    public static function getLanguages()
    {
        return self::$languages;
    }

    public static function getStatuses()
    {
        return self::$statuses;
    }
}
