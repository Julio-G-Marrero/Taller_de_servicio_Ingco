<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolDashboardCompleto
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
        if($request->user()->role_id == 4 || $request->user()->role_id == 1){
            return redirect()->route('inicio');
        }
        return $next($request);
    }
}