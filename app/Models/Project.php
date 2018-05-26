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
        'language',
        'link',
        'status'
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
}
