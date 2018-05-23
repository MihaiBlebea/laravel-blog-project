<?php

namespace App\Interfaces;

interface ImageServiceInterface
{
    public static function store($file, String $name = null);
}
