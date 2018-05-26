<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Category,
    Post,
    Profile
};


class Image extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'image_id');
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'image_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'image_id');
    }

}
