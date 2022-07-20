<?php

use App\Exports\EnrollmentFormExport;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Cashier\CashierDashboardController;
use App\Http\Controllers\Cashier\Payment\Confirmed\ConfirmedController;
use App\Http\Controllers\Cashier\Payment\Pending\PendingController;
use App\Http\Controllers\Cashier\Payment\Student\StudentPaymentController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Manage\ExportController;
use App\Http\Controllers\Manage\MailController;
use App\Http\Controllers\Registrar\RegistrarDashboardController;
use App\Http\Controllers\Registrar\Section\SectionController;
use App\Http\Controllers\Registrar\Student\Enrolled\EnrolledStudentController;
use App\Http\Controllers\Registrar\Student\Enrollee\EnrolleeController;
use App\Http\Controllers\Registrar\Subject\SubjectController;
use App\Http\Controllers\Registrar\Teacher\TeacherController;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest', 'PreventBack'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/',  'index')->name('home.index');
        Route::get('/aboutus',  'about')->name('about.index');
        Route::get('/academics',  'academics')->name('academics.index');
        Route::get('/academics/primary',  'primary')->name('primary.index');
        Route::get('/academics/primary/nursery',  'nursery')->name('nursery.index');
        Route::get('/academics/primary/kindergarten',  'nursery')->name('kindergarten.index');
        Route::get('/academics/primary/preparatory',  'nursery')->name('preparatory.index');
        Route::get('/academics/elementary',  'elementary')->name('elementary.index');
        Route::get('/academics/junior highschool',  'juniorhighschool')->name('juniorhighschool.index');
        Route::get('/calendar',  'calendar')->name('calendar.index');
        Route::get('/photo gallery',  'photo')->name('photo.gallery.index');
        Route::get('/enroll/form',  'enroll')->name('enroll.index');
        Route::get('/portal',  'portal')->name('portal.index');
        Route::get('/portals',  'special')->name('special.index');
    });
    Route::controller(MailController::class)->group(function () {
        Route::post('/resend/verification/code', 'resendCode')->name('resend.code');
        Route::get('/verify', 'verifyStudent')->name('verify.student');
        Route::post('/send/otp/code', 'resendCode')->name('send.otp');
    });
    Route::view('/resend/verification', 'BCA.Home.pages.verification.index');
    Route::view('/send/otp', 'BCA.Home.pages.verification.index')->name('otp');
});
/* route::get('/verify/email', function () {
    $code = sha1(time());
    $name = 'roy';
    $recipient = 'royjosephlatayan16@gmail.com';
    MailController::sendVerificationCodeMail($name, $recipient, $code);
});
route::get('/a', function () {
    dd(payment_logs::where('payment_id', '=', 1)->latest()->first());
});
route::get('/verified/email', function () {
    $name = 'roy';
    $recipient = 'royjosephlatayan16@gmail.com';
    MailController::sendVerifiedMail($name, $recipient);
});
route::get('/accepted/email', function () {
    $code = sha1(time());
    $name = 'roy';
    $password = 'password123';
    $recipient = 'royjosephlatayan16@gmail.com';
    MailController::sendAcceptedMail($name, $recipient, $password);
}); */
route::prefix('admin')->name('admin.')->group(function () {
    route::middleware(['guest:admin', 'PreventBack'])->controller(LoginController::class)->group(function () {
        Route::view('/portal', 'BCA.Home.pages.portal.portals.admin')->name('portal');
        Route::post('/login', 'adminLogin')->name('login');
    });
    route::middleware(['auth:admin', 'isAdmin'])->group(function () {
        Route::post('/logout', [LoginController::class, 'adminLogout'])->name('logout');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

        route::name('events.')->controller(EventController::class)->group(function () {
            Route::get('/events', 'index')->name('index');
            Route::post('/events/add', 'store')->name('store');
            Route::put('/events/update/{id}', 'update')->name('update');
            Route::delete('/events/delete/{id}', 'destroy')->name('destroy');
        });
    });
});
route::prefix('cashier')->name('cashier.')->group(function () {
    route::middleware(['guest:registrar', 'PreventBack'])->controller(LoginController::class)->group(function () {
        Route::view('/portal', 'BCA.Home.pages.portal.portals.registrar')->name('portal');
        Route::post('/login', 'registrarLogin')->name('login');
    });
    route::middleware(['auth:registrar', 'isCashier'])->group(function () {
        Route::post('/logout', [LoginController::class, 'cashierLogout'])->name('logout');
        /* Dashboard */
        Route::get('/dashboard', [CashierDashboardController::class, 'index'])->name('dashboard.index');
        Route::name('payment.pending.')->controller(PendingController::class)->group(function () {
            Route::get('/payment/pending', 'index')->name('index');
            Route::post('/payment/pending', 'store')->name('store');
            Route::post('/payment/pending/confirm/{id}', 'update')->name('update');
        });
        Route::name('payment.confirmed.')->controller(ConfirmedController::class)->group(function () {
            Route::get('/payment/confirmed', 'index')->name('index');
        });
        Route::name('payment.student.')->controller(StudentPaymentController::class)->group(function () {
            Route::get('/payment/student/index', 'index')->name('index');
        });
        Route::post('/update/sy/{id}', function ($id) {
            $current = SchoolYear::where('isCurrentViewByCashier', '=', 1)->first()->update(['isCurrentViewByCashier' => 0]);
            $new = SchoolYear::where('id', '=', $id)->first()->update(['isCurrentViewByCashier' => 1]);
            return back();
        })->name('change.sy');
    });
});

Route::prefix('registrar')->name('registrar.')->group(function () {
    route::middleware(['guest:registrar', 'PreventBack'])->controller(LoginController::class)->group(function () {
        Route::view('/portal', 'BCA.Home.pages.portal.portals.registrar')->name('portal');
        Route::post('/login', 'registrarLogin')->name('login');
    });
    Route::middleware(['auth:registrar', 'isRegistrar'])->group(function () {
        Route::post('/logout', [LoginController::class, 'registrarLogout'])->name('logout');
        /* Dashboard */
        Route::get('/dashboard', [RegistrarDashboardController::class, 'index'])->name('dashboard.index');
        Route::post('/update/sy/{id}', function ($id) {
            $current = SchoolYear::where('isCurrentViewByRegistrar', '=', 1)->first()->update(['isCurrentViewByRegistrar' => 0]);
            $new = SchoolYear::where('id', '=', $id)->first()->update(['isCurrentViewByRegistrar' => 1]);
            return back();
        })->name('change.sy');
        Route::get('/update/sy/enrollment', function () {
            try {
                $current = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->first()->update(['isEnrollment' => 0, 'isCurrent' => 0]);
                $new = SchoolYear::where('isCurrentViewByRegistrar', '=', 1)->first()->update(['isEnrollment' => 1, 'isCurrent' => 1]);
            } catch (\Throwable $th) {
                $current = SchoolYear::where('isCurrentViewByRegistrar', '=', 1)->first()->update(['isEnrollment' => 1, 'isCurrent' => 1]);
            }
            toast()->success('SYSTEM MESSAGE', 'Updated successfully.')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return back();
        })->name('change.sy.enrollment');
        /* registrar|student */
        //Enrollee
        route::name('enrollees.')->controller(EnrolleeController::class)->group(function () {
            Route::get('/students/create', 'create')->name('create');
            Route::post('/students/enrollee/{id}/store', 'store')->name('store');
            Route::get('/students/enrollee', 'index')->name('index');
            Route::get('/students/enrollee/{id}/show', 'show')->name('show');
            Route::get('/students/enrollee/{id}/requirements', 'show')->name('show.requirements');
        });
        Route::post('/students/enrollee/requirements', [EnrolleeRequirementController::class, 'store'])->name('enrollee.store.requirements');
        //Enrolled
        route::name('enrolled.')->controller(EnrolledStudentController::class)->group(function () {
            Route::get('/students/enrolled', 'index')->name('index');
            Route::get('/students/enrolled/{id}/show', 'show')->name('show');
            Route::put('/students/enrolled/{id}', 'update')->name('update');
            Route::get('/students/enrolled/{id}/requirements', 'show')->name('show.requirements');
        });
        Route::post('/students/enrolled/requirements', [RequirementsController::class, 'store'])->name('enrolled.store.requirements');
        /* Registrar|teacher */
        route::name('teachers.')->controller(TeacherController::class)->group(function () {
            Route::get('/teachers',  'index')->name('index');
            Route::get('/teachers/create',  'create')->name('create');
            Route::post('/teachers',  'store')->name('store');
            Route::get('/teachers/{id}/edit',  'edit')->name('edit');
            Route::put('/teachers/{id}',  'update')->name('update');
        });
        /* Registrar|section */
        route::name('section.')->controller(SectionController::class)->group(function () {
            Route::get('/section/grade/levels', 'section')->name('index.grade.levels');
            Route::get('/section/{id}', 'index')->name('index');
            Route::get('/section/{id}/show', 'show')->name('show');
            Route::post('/section', 'store')->name('store');
            Route::put('/section/{id}/update', 'update')->name('update');
            Route::delete('/section/{id}/delete', 'destroy')->name('destroy');
            Route::get('/section/{id}/list', 'list')->name('student.list');
            /* Registrar | Sections in grade level */
        });

        /* Registrar|subject */
        route::name('subject.')->controller(SubjectController::class)->group(function () {
            Route::get('/subjects/grade/levels', 'subjects')->name('index.grade.levels');
            Route::get('/subjects/{id}', 'index')->name('index');
            Route::post('/subjects', 'store')->name('store');
            Route::put('/subjects/{id}', 'update')->name('update');
            Route::delete('/subjects/{id}', 'destroy')->name('destroy');
        });
    });
});

route::prefix('teacher')->name('teacher.')->group(function () {
    route::middleware(['guest:teacher', 'PreventBack'])->controller(LoginController::class)->group(function () {
        Route::view('/portal', 'BCA.Home.pages.portal.portals.teacher')->name('portal');
        Route::post('/login', 'teacherLogin')->name('login');
    });
    route::middleware(['auth:teacher'])->group(function () {
        Route::post('/logout', [LoginController::class, 'teacherlogout'])->name('logout');
        Route::get('/dashboard', [TeacherDashboard::class, 'index'])->name('dashboard.index');
    });
});
route::prefix('student')->name('student.')->group(function () {
    route::middleware(['guest:student', 'PreventBack'])->controller(LoginController::class)->group(function () {
        Route::view('/portal', 'BCA.Home.pages.portal.portals.student')->name('portal');
        Route::post('/login', 'studentLogin')->name('login');
    });
    route::middleware(['auth:student', 'isStudent'])->group(function () {
        Route::post('/logout', [LoginController::class, 'studentlogout'])->name('logout');
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard.index');

        Route::name('enrolment.')->controller(EnrollmentController::class)->group(function () {
            Route::get('/enrollment', 'index')->name('index');
        });
    });
});

Route::get('/export/enrollees',[ExportController::class,'exportEnrollees']);
Route::get('/export/enrolled',[ExportController::class,'exportEnrollees']);
