<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserCheck
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

         if(Auth::check() && in_array(Auth::user()->user_type ,  ['user','admin'])){

            if(Auth::user()->user_type ==  'user'){

                $login_token = $request->session()->get('login_token');
                
                if(Auth::user()->remember_token != $login_token ){
                    Auth::logout();
                    return redirect()->route('home');
                } 
            }

            return $next($request);

        }else{
            return redirect()->route('home');
        }
    }


    
}
