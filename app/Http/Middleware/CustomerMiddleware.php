<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class CustomerMiddleware
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
        if (Auth::guard('customers')->check()) {
            if(Customer()->is_active == false) {
                Auth::guard('customers')->logout();
                Flash::error(__('auth.login_unsuccessful_not_active'));
                return redirect(route('login'));
            }
            return $next($request);
        }
        return redirect(route('login'));
      
    }
}
