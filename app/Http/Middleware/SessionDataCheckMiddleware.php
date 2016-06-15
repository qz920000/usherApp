<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class SessionDataCheckMiddleware
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
        $bag = Session::getMetadataBag();
        
        $max = config('session.lifetime') * 2;//60; // min to hours conversion
        
        if (($bag && $max < (time() - $bag->getLastUsed()))) {
            
            $request->session()->flush(); // remove all the session data
            
            Auth::logout(); // logout user
             $message ='You are now logged out due to inactivity.';
        return redirect('/login')->with('status', $message);
            
        }
 
        return $next($request);
    }

        //--
       // return $next($request);
    //}
}
