<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!$request->user()->hasRole($role))
        {
            return abort(404);
        }
        return $next($request);
    }
}
