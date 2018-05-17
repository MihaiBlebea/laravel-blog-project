<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Traits\SearchableTrait;

class Post extends Model
{
    use SearchableTrait;

    protected $fillable = [
        'category_id',
        'slug',
        'user_id',
        'title',
        'feature_image',
        'content',
        'published',
        'publish_date'
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

    // Custom methods
    public function except()
    {
        return substr(strip_tags($this->content), 0, 200);
    }

    // public static function search(String $search_term)
    // {
    //     return self::where('title', 'LIKE', '%' . $search_term . '%')->get();
    // }
}
