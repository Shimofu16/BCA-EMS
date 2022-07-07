<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isCashier
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
        if (Auth::guard('registrar')->check()) {
            if (Auth::guard('registrar')->user()->active == 1 && Auth::guard('registrar')->user()->isRegistrar == 0) {
                return $next($request);
            } elseif (Auth::guard('registrar')->user()->active == 1 && Auth::guard('registrar')->user()->isRegistrar == 1) {
                return redirect()->route('registrar.dashboard.index');
            }
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('registrar.portal');
    }
}
