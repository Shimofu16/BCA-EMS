<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'admin') {
                    return redirect()->intended(route('admin.dashboard.index'));
                }
                if ($guard == 'registrar') {
                    if (Auth::guard('registrar')->user()->isRegistrar == 1) {
                        return redirect()->intended(route('registrar.dashboard.index'));
                    } else {
                        return redirect()->intended(route('cashier.dashboard.index'));
                    }
                }
                if ($guard == 'student') {
                    return redirect()->intended(route('student.dashboard.index'));
                }
                return redirect()->route('home.index');
            }
        }
        return $next($request);
    }
}
