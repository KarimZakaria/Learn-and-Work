<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
{
    public function handle($request, Closure $next, $guard)
    {
        if(!auth()->guard($guard)->check())  
        {
            return redirect(route('Admin.Login'));
        }
        
        return $next($request);

    }
}
