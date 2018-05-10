<?php

namespace App\Services;

use GuzzleHttp\Client as Guzzle;
use App\Interfaces\RepoServiceInterface;
use Exception;

class RepoService implements RepoServiceInterface
{
    private $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function repos(String $url)
    {
        $response = $this->guzzle->request('GET', $url);
        if($response->getStatusCode() == 200)
        {
            return collect(json_decode($response->getBody()->getContents()));
        }
        throw new Exception("Coult not get the repos from GitHub", 1);
    }

    public function repo(String $url)
    {
        $response = $this->guzzle->request('GET', $url);
        if($response->getStatusCode() == 200)
        {
            return collect(json_decode($response->getBody()->getContents()));
        }
        throw new Exception("Coult not get the repo from GitHub", 1);
    }
}
