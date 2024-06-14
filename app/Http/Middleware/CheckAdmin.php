<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Assuming 'admin' role means having user_id = 1
        if (Auth::check() && Auth::id() == 1) {
            return $next($request);
        }

        // Return a response indicating unauthorized access
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
