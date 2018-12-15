<?php

namespace App\Http\Middleware;

use Closure;

class CheckOfficerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (1) {
            route('login');
        }
//        echo "Role: ".$role;

        return $next($request);
    }
}
