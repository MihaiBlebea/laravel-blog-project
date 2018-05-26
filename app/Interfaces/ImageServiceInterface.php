<?php

namespace App\Interfaces;

use App\Models\User;


interface ImageServiceInterface
{
    public static function store($file, User $user = null);
}
