<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLoggedTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
            // check if no one has logged in or the logged person is admin, then abort
            if(!auth()->check() || auth()->user()->isAdmin==1){
                //abort(403);
                return redirect('/login')->with('error','you must be logged as a teacher');
            }
       
        return $next($request);
    }
}
