<?php

namespace App\Interfaces;

use GuzzleHttp\Client as Guzzle;

interface RepoServiceInterface
{
    public function __construct(Guzzle $guzzle);

    public function repos(String $url);

    public function repo(String $url);
}
