<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Search extends Model
{
    protected $fillable = [
        'user_id',
        'term',
        'model',
        'results_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
