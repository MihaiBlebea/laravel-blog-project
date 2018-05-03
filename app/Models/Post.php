<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'feature_image',
        'content'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value, '-');
    }

    // TO DO delete the old image everytime a new image is uploaded

    // Relationship methods
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function except()
    {
        return substr($this->content, 0, 200) . '...';
    }
}
