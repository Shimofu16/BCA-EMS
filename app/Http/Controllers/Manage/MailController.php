<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Mail\Enrollment\Accepted;
use App\Mail\Enrollment\Code;
use App\Mail\Enrollment\Verified;
use App\Models\Registrar\Student as RegistrarStudent;
use App\Models\Registrar\VerificationCode;
use App\Models\Registrar\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public static function sendAcceptedMail($name, $recipient, $password)
    {
        $data = [
            'name' => $name,
            'password' => $password,
        ];
        Mail::to($recipient)->send(new Accepted($data));
    }
    public static function sendVerificationCodeMail($name, $recipient, $verification_code)
    {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($recipient)->send(new Code($data));
    }
    public static function sendVerifiedMail($name, $recipient,)
    {
        $data = [
            'name' => $name,
        ];
        Mail::to($recipient)->send(new Verified($data));
    }
    public function verifyStudent(Request $request)
    {
        try {
            $verification_code = VerificationCode::where('verification_code', $request->token)->firstOrFail();
            try {
                $student = Student::where('student_id', $verification_code->student_id)->firstOrFail();
                $student->hasVerifiedEmail = 1;
                try {
                    $student->save();
                    $verification_code->delete();
                    $this->sendVerifiedMail($student->first_name,$student->email);
                    alert()->success('Success', 'Your email address has been successfully validated!');
                    return redirect()->route('enroll.index');
                } catch (\Throwable $th) {
                    alert()->error('Error', $th->getMessage());
                    return redirect()->route('enroll.index');
                }
            } catch (ModelNotFoundException $th) {
                alert()->error('ErrorAlert', $th->getMessage());
                return redirect()->route('enroll.index');
            }
        } catch (ModelNotFoundException $th) {
            alert()->error('Error', 'Invalid Verofication Code')->footer('<a href="/resend/verification">Resend Verification Code?</a>');
            return redirect()->route('enroll.index');
        }
    }
    public function resendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email'
        ]);
        $student = Student::where('email', $request->email)->first();
        if ($student != null) {
            $del = VerificationCode::where('student_id', $student->student_id)->first();
            if ($del != null) {
                $del->delete();
            }
            if ($student->hasVerifiedEmail == 0) {
                $code = sha1(time() . $student->student_id);
                VerificationCode::create([
                    'student_id' => $this->student_id,
                    'verification_code' => $code,
                    'date_sent' => now()->toDateString(),
                    'expiration_date' => now()->addDay(3),
                ]);
                $recipient = $student->email;
                MailController::sendVerificationCodeMail($student->first_name, $recipient, $code);
                alert()->success('Success', 'Verification code successfully sent to your Email')->autoClose(5000);
                return back();
            }
            alert()->info('Information', 'Your Email is already veified')->autoClose(5000);
            return back();
        }
        alert()->error('Error', 'Invalid Email')->autoClose(5000);
        return back();
    }
}
