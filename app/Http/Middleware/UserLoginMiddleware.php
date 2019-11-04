<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class UserLoginMiddleware
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
        // dd(auth()->user());
        if(Auth::user()){
            // $user = Auth::user();

                return $next($request);

          
        }
        else{
            return redirect('user/login');
        }

        // dd(Auth::user(),Auth::guest());
        // if ($this->auth->guest()) {
        //     if ($request->ajax()) {
        //         return response('Unauthorized.', 401);
        //     } else {
        //         return redirect()->guest('user/login');
        //     }
        // }
        
        // return $next($request);
    }
}
