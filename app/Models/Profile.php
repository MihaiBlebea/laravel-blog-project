<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    User,
    Image
};

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'short_description',
        'description',
        'image_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function except()
    {
        return substr(strip_tags($this->short_description), 0, 200);
    }
}
