<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    protected $fillable = [
        'company_name',
        'description',
        'position',
        'start_date',
        'end_date'
    ];
}
