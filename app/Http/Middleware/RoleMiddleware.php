<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if(auth()->user() && $request->user()->hasAnyRole($roles))
        {
            return $next($request);
        }
        return abort(403);
    }
}
