<?php

namespace App\Http\Middleware;

use App\Employee;
use Auth;
use Closure;

class AccessControlList
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
        $employee = Employee::find(Auth::user()->id);
        if ($employee->isACLAuthorized($request->getPathInfo())) {
            return $next($request);
        }

        abort(401);
    }
}
