<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                if (Auth::guard('registrar')->check()  && Auth::guard('registrar')->user()->active == 1) {
                    if (Auth::guard('registrar')->user()->isRegistrar == 1) {
                        return route('registrar.dashboard.index');
                    }else{
                        return route('cashier.dashboard.index');
                    }
                }
                if (Auth::guard('teacher')->check()  && Auth::guard('teacher')->user()->active == 1) {
                    return route('teacher.dashboard.index');
                }
                if (Auth::guard('student')->check()  && Auth::guard('student')->user()->active == 1) {
                    return route('student.dashboard.index');
                }
                return route('admin.portal');
            }
            if ($request->routeIs('registrar.*')) {
                if (Auth::guard('admin')->check()  && Auth::guard('admin')->user()->active == 1) {
                    return route('admin.dashboard.index');
                }
                if (Auth::guard('teacher')->check()  && Auth::guard('teacher')->user()->active == 1) {
                    return route('teacher.dashboard.index');
                }
                if (Auth::guard('student')->check()  && Auth::guard('student')->user()->active == 1) {
                    return route('student.dashboard.index');
                }
                return route('registrar.portal');
            }
            if ($request->routeIs('cashier.*')) {
                if (Auth::guard('admin')->check()  && Auth::guard('admin')->user()->active == 1) {
                    return route('admin.dashboard.index');
                }
                if (Auth::guard('registrar')->check()  && Auth::guard('registrar')->user()->active == 1) {
                    if (Auth::guard('registrar')->user()->isRegistrar == 1) {
                        return route('registrar.dashboard.index');
                    }
                }
                if (Auth::guard('teacher')->check()  && Auth::guard('teacher')->user()->active == 1) {
                    return route('teacher.dashboard.index');
                }
                if (Auth::guard('student')->check()  && Auth::guard('student')->user()->active == 1) {
                    return route('student.dashboard.index');
                }
                return route('registrar.portal');
            }
            if ($request->routeIs('teacher.*')) {
                if (Auth::guard('admin')->check()  && Auth::guard('admin')->user()->active == 1) {
                    return route('admin.dashboard.index');
                }
                if (Auth::guard('registrar')->check()  && Auth::guard('registrar')->user()->active == 1) {
                    if (Auth::guard('registrar')->user()->isRegistrar == 1) {
                        return route('registrar.dashboard.index');
                    }else{
                        return route('cashier.dashboard.index');
                    }
                }
                if (Auth::guard('student')->check()  && Auth::guard('student')->user()->active == 1) {
                    return route('student.dashboard.index');
                }
                return route('teacher.portal');
            }
            if ($request->routeIs('student.*')) {
                if (Auth::guard('admin')->check()  && Auth::guard('admin')->user()->active == 1) {
                    return route('admin.dashboard.index');
                }
                if (Auth::guard('registrar')->check()  && Auth::guard('registrar')->user()->active == 1) {
                    if (Auth::guard('registrar')->user()->isRegistrar == 1) {
                        return route('registrar.dashboard.index');
                    }else{
                        return route('cashier.dashboard.index');
                    }
                }
                if (Auth::guard('teacher')->check()  && Auth::guard('teacher')->user()->active == 1) {
                    return route('teacher.dashboard.index');
                }
                return route('student.portal');
            }
            return route('portal.index');
        }
    }
}
