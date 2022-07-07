<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isTeacher
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
        if (Auth::guard('teacher')->check()) {
            if (Auth::guard('teacher')->user()->active == 1) {
                return $next($request);
            } else {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('teacher.portal');
    }
}
