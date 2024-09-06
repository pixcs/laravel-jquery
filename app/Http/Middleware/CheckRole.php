<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $val)
    {
        
       /*  if(auth()->user()->hasRole($val)) {
            return redirect("/$val");
        } */

        return $next($request);
    }
}
