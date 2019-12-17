<?php

namespace App\Http\Middleware;

use Closure;

use Session;

class LoginFront
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

        if(empty(Session::has('frontSession'))){
            return redirect('/loginuser');
        }
        return $next($request);
    }
}
