<?php

namespace App\Http\Middleware;

use Closure;

class CheckShortlinks
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
        $thearray = explode('-',$request->id);
        if(count($thearray) != 2){
            return abort(404);
        }

        if(count($thearray) == 2){
            return (int)$thearray[1] ? $next($request) : abort(404);
        }
        return $next($request);
    }
}
