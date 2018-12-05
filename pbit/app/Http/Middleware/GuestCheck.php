<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class GuestCheck
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
         if(Auth::check()){
            return redirect()->back();
        }else{
            return $next($request);
        }
    }


    
}
