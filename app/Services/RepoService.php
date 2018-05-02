<?php

namespace App\Services;

use GuzzleHttp\Client as Guzzle;
use App\Interfaces\RepoServiceInterface;
use Exception;

class RepoService implements RepoServiceInterface
{
    private $url;

    private $guzzle;

    public function __construct(Guzzle $guzzle, String $url)
    {
        $this->url = $url;
        $this->guzzle = $guzzle;
    }

    public function repos()
    {
        $response = $this->guzzle->request('GET', $this->url);
        if($response->getStatusCode() == 200)
        {
            return collect(json_decode($response->getBody()->getContents()));
        }
        throw new Exception("Coult not get the repos from GitHub", 1);
    }
}
