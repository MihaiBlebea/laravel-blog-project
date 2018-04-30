<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'cover_image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function shortDescription()
    {
        return substr($this->description, 0, 150) . '...';
    }
}
