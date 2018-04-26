<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function user()
    {
        return $this->hasMany(config('generic.user_model'));
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions')->withTimestamps();
    }
}
