<?php

namespace App\Http\Middleware;

use Closure;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        $permissions = array_merge($permissions);
        if(Auth::guest() || !Auth::user()->hasPermission()){
            return redirect()->route('home');
        }

        return $next($request);                
    }
}
