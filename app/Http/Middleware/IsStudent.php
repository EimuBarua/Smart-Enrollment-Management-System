<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session; 

class IsStudent
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
        if(Session::get('userrole') != 'student'){
            return redirect('dashboard')->with('message','You are not authorized to access the page');
        }
        return $next($request);
    }
}
