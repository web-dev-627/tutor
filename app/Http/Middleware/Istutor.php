<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Istutor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     //pass if tutor has not logged in
    public function handle(Request $request, Closure $next)
    {
        if (count(Auth::user()->tutor) === 0)
            return $next($request);
        else
            return redirect('home');
    }
}
