<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class QuitMiddleware
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
        if(session('user')){

        return $next($request);

        }else{

            return redirect('/admin/login/login');
        }
    }
    
}
