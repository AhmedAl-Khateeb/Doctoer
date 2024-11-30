<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->usertype === $role) {
            return $next($request);
        }

        return response()->json([
            'message' => 'ليس لديك صلاحيات لهذه الصفحة'
        ], 403);
    }

}
