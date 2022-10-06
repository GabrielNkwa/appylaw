<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ControlAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //check if user is the actual tenant
        if(user()->tenant_id == "3"){
            toast("info", "you do not have the required permission to access this page");
            return redirect()->route('logout');
        }

        return $next($request);
    }
}
