<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Category
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

}
