<?php

namespace App\Http\Middleware;

use Closure;

class UserAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $action_name)
    {
        $response = $next($request);

        if($request->user()) {
            $request->user()->actions()->create([
                'name' => $action_name,
                'result' =>  $response->status()
            ]);
        }

        return $next($request);
    }
}
 