<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Track;

class TrackMiddleware
{
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        $track = Track::firstOrCreate(['link' => $path]);
        $track->increment('count');

        return $next($request);
    }
}
