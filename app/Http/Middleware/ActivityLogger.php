<?php

namespace App\Http\Middleware;

use App\Logz;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityLogger
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
        $log = new Logz();
        $log->user_id = (Auth::user() != null ? Auth::user()->id : -1);
        $log->method = $request->method();
        $log->page = $request->path();
        $log->ip_addr = Request::ip();
        $log->user_agent = ($request->userAgent() != null ? $request->userAgent() : 'N/A');
        $log->type = 'log';
        $log->activity = '';
        $params = $request->all();
        unset($params['password']);
        $log->data = json_encode($params);
        $log->save();

        return $next($request);
    }
}
