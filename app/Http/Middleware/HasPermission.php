<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;
use Illuminate\Support\Facades\Log;

class HasPermission
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
        $arguments = func_get_args();
        $permissions = array_splice($arguments, 2, count($arguments)-2);
        if(Auth::guest() || !Auth::user()->hasPermission($permissions)){
            return redirect()->back()->withErrors(['Access Denied']);
        }

        return $next($request);                
    }
}
