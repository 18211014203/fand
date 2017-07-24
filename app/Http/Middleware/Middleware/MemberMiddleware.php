<?php

namespace App\Http\Middleware\Middleware;

use Closure;

class MemberMiddleware
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
        if(session('user')==null){
            return redirect('/login/login');
        }else{
            return $next($request);
        }

    }
}
