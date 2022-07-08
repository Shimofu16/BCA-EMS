<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminAccount;
use App\Models\Admin\AdminAccountLog;
use App\Models\Registrar\RegistrarAccount;
use App\Models\Registrar\RegistrarAccountLog;
use App\Models\Student\StudentAccount;
use App\Models\Student\StudentAccountLog;
use App\Models\Teacher\TeacherAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function adminLogin(Request $request)
    {
        $credentials =  $this->validateData($request);
        if (Auth::guard('admin')->attempt($credentials)) {
            if (Auth::guard('admin')->attempt(['email' => request()->email, 'password' => request()->password])) {
                if (Auth::guard('admin')->user()->active == 0) {
                    AdminAccount::where('id', '=', Auth::guard('admin')->id())->update(['active' => 1]);
                    AdminAccountLog::create([
                        'admin_id' => Auth::guard('admin')->id(),
                        'name' => Auth::guard('admin')->user()->name,
                        'time_in' => now()->format('H:i:m'),
                        'created_at' => now()
                    ]);
                    Session::put('id', Auth::guard('admin')->id());
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard.index');
                }
                AdminAccount::where('id', '=', Auth::guard('admin')->id())->update(['otp' => sha1(now() . Auth::guard('admin')->id())]);
                Auth::guard('admin')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::put('active', true);
                return back()->withErrors([
                    'email' => 'Error logging in. Please try again later.',
                ]);
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function registrarLogin(Request $request)
    {
        $credentials =  $this->validateData($request);
        if (Auth::guard('registrar')->attempt($credentials)) {
            if (Auth::guard('registrar')->attempt(['email' => request()->email, 'password' => request()->password])) {
                if (Auth::guard('registrar')->user()->active == 0) {
                    RegistrarAccount::where('id', '=', Auth::guard('registrar')->id())->update(['active' => 1]);
                    RegistrarAccountLog::create([
                        'registrar_id' => Auth::guard('registrar')->id(),
                        'name' => Auth::guard('registrar')->user()->name,
                        'time_in' => now()->format('H:i:m'),
                        'created_at' => now(),
                    ]);
                    $request->session()->regenerate();
                    if (Auth::guard('registrar')->user()->isRegistrar == 1) {
                        return redirect()->intended(route('registrar.dashboard.index'));
                    } else {
                        return redirect()->intended(route('cashier.dashboard.index'));
                    }
                }
                RegistrarAccount::where('id', '=', Auth::guard('registrar')->id())->update(['otp' => sha1(now() . Auth::guard('registrar')->id())]);
                Auth::guard('registrar')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::put('active', true);
                return back()->withErrors([
                    'email' => 'Error logging in. Please try again later.',
                ]);
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function teacherLogin(Request $request)
    {
        $credentials =  $this->validateData($request);
        if (Auth::guard('teacher')->attempt($credentials)) {
            if (Auth::guard('teacher')->attempt(['email' => request()->email, 'password' => request()->password])) {
                TeacherAccount::where('id', '=', Auth::guard('teacher')->id())->update(['active' => 1]);
                $request->session()->regenerate();
                return redirect()->intended(route('teacher.dashboard.index'));
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function studentLogin(Request $request)
    {
        $credentials =  $request->validate([
            'student_id' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('student')->attempt($credentials)) {
            if (Auth::guard('student')->attempt(['student_id' => request()->student_id, 'password' => request()->password])) {
                if (Auth::guard('student')->user()->active == 0) {
                    StudentAccount::where('id', '=', Auth::guard('student')->id())->update(['active' => 1]);
                    StudentAccountLog::create([
                        'student_id' => Auth::guard('student')->id(),
                        'name' => Auth::guard('student')->user()->name,
                        'action' => 'Login',
                        'time_in' => now()->format('H:i:m'),
                        'created_at' => now(),
                    ]);
                    $request->session()->regenerate();
                    return redirect()->intended(route('student.dashboard.index'));
                }
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'student_id' => 'Error logging in. Please try again later.',
                ]);
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    private function validateData($request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        return $credentials;
    }
    public function adminLogout(Request $request)
    {
        $id = request()->validate([
            'id' => 'required|exists:admins,id'
        ]);
        if ($id) {
            AdminAccount::where('id', '=', request()->id)->update(['active' => 0]);
            AdminAccountLog::where('admin_id', '=', request()->id)->latest()->first()->update(['time_out' => now()->format('H:i:m'), 'updated_at' => now()]);
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::guard('admin')->logout();
            return redirect()->route('home.index');
        }
        toast()->error('<strong class="text-black">' . 'ERROR MESSAGE' . '</strong>', '<strong class="text-black">User not found</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
        return back();
    }
    public function registrarLogout(Request $request)
    {
        $id = request()->validate([
            'id' => 'required|exists:registrar_accounts,id'
        ]);
        if ($id) {
            RegistrarAccount::where('id', '=', request()->id)->update(['active' => 0]);
            RegistrarAccountLog::where('registrar_id', '=', request()->id)->latest()->first()->update(['time_out' => now()->format('H:i:m'), 'updated_at' => now()]);
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::guard('registrar')->logout();
            return redirect()->route('home.index');
        }
        toast()->error('<strong class="text-black">' . 'ERROR MESSAGE' . '</strong>', '<strong class="text-black">User not found</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
        return back();
    }
    public function cashierLogout(Request $request)
    {
        $id = request()->validate([
            'id' => 'required|exists:registrar_accounts,id'
        ]);
        if ($id) {
            RegistrarAccount::where('id', '=', request()->id)->update(['active' => 0]);
            RegistrarAccountLog::where('registrar_id', '=', request()->id)->latest()->first()->update(['time_out' => now()->format('H:i:m'), 'updated_at' => now()]);
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::guard('registrar')->logout();
            return redirect()->route('home.index');
        }
        toast()->error('<strong class="text-black">' . 'ERROR MESSAGE' . '</strong>', '<strong class="text-black">User not found</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
        return back();
    }
    public function teacherLogout(Request $request)
    {
        $id = request()->validate([
            'id' => 'required|exists:teacher_accounts,id'
        ]);
        if ($id) {
            TeacherAccount::where('id', '=', request()->id)->update(['active' => 0]);
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::guard('teacher')->logout();
            return redirect()->route('home.index');
        }
        toast()->error('<strong class="text-black">' . 'ERROR MESSAGE' . '</strong>', '<strong class="text-black">User not found</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
        return back();
    }
    public function studentLogout(Request $request)
    {
        $id = request()->validate([
            'id' => 'required|exists:student_accounts,id'
        ]);
        if ($id) {
            StudentAccount::where('id', '=', request()->id)->update(['active' => 0]);
            StudentAccountLog::where('student_id', '=', request()->id)
                ->where('action', '=', 'Login')
                ->first()
                ->update(['time_out' => now()->format('H:i:m'), 'updated_at' => now()]);

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::guard('student')->logout();
            return redirect()->route('home.index');
        }
        toast()->error('<strong class="text-black">' . 'ERROR MESSAGE' . '</strong>', '<strong class="text-black">User not found</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
        return back();
    }
}
