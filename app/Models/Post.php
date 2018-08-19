<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Comment,
    Category,
    Image
};
use App\Traits\SearchableTrait;

class Post extends Model
{
    use SearchableTrait;

    protected $fillable = [
        'category_id',
        'slug',
        'user_id',
        'image_id',
        'title',
        'content',
        'status'
    ];

    private static $search_fileds = [
        'title'
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

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    // Custom methods
    public function except()
    {
        return substr(strip_tags($this->content), 0, 200);
    }

    public function getFullSlug()
    {
        return '/blog/' . $this->category->slug . '/' . $this->slug;
    }

    public function getUrl()
    {
        return config('app.url') . $this->getFullSlug();
    }
}
