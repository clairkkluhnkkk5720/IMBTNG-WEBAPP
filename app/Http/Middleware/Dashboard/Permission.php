<?php

namespace App\Http\Middleware\Dashboard;

use Auth;
use Closure;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permName)
    {
        if (Auth::guard('admin')->user()->hasPermission($permName)) {
            return unauthorized(401);
        }

        return $next($request);
    }
}
