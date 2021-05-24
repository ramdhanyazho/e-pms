<?php

namespace App\Http\Middleware;
use Closure;
use Auth;

class isLogin 
{
    
	public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::check()) {
	    	return redirect('login');
	    }

        return $next($request);
    }
}
