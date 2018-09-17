<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'parent_id',
        'subject',
        'content',
        'approved'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
