<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Post,
    Image
};

class Category extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'image_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value, '-');
    }

    public function shortDescription()
    {
        return substr($this->description, 0, 150) . '...';
    }
}
