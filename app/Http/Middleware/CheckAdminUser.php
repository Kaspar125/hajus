<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminUser
{
    /**
     
Handle an incoming request.*
@param  \Illuminate\Http\Request  $request
@param  \Closure  $next
@return mixed
*/
public function handle(Request $request, Closure $next){
    if (Auth::user()->id === 1) {
        return $next($request);}

        return redirect('/')->with('error', 'You are not authorized to perform this action.');
    }
}