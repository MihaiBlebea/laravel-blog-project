<?php

namespace App\Interfaces;

use GuzzleHttp\Client as Guzzle;

interface RepoServiceInterface
{
    public function __construct(Guzzle $guzzle, String $url);

    public function repos();
}
