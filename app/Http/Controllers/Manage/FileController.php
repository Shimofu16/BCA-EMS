<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\requirements as Requirement;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
    public static function folder($path)
    {
        if (!file_exists($path)) {
            Storage::disk('local')->makeDirectory($path);
        }
    }
    public static function requirements($path, $student_id, $psa, $form_137, $good_moral, $photo)
    {
        $hasFilePsa = false;
        $hasFileForm137 = false;
        $hasFileGoodMoral = false;
        $hasFilePhoto = false;

        /* dd($psa != null, $form_137 != null, $good_moral != null, $photo != null , $student_id); */
        try {
            if ($psa != null) {
                try {
                    $psaFile = Requirement::where('student_id', $student_id)
                        ->where('filename', 'psa')
                        ->where('isSubmitted', 1)
                        ->firstOrFail();
                    $hasFilePsa = true;
                } catch (ModelNotFoundException $e) {
                    $hasFilePsa = false;
                    $psaextention = $psa->getClientOriginalExtension();
                    //rename file to psa
                    $psafilename =  'psa' . '.' . $psaextention;
                    $psaRequirement = [
                        'student_id' => $student_id,
                        'filename' => 'psa',
                        'filepath' =>  $path . '/' . $psafilename,
                        'isSubmitted' => 1,
                    ];
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (!file_exists(storage_path('app/' . $path . '/' . $psafilename))) {
                        //if not exist move file with name of psa in folder /uploads/requirements/ + student full name
                        $psa->storeAs($path, $psafilename);
                    }
                    //checl if meron na ba data or submitted na ba yung requirements sa db before bumalik
                    Requirement::create($psaRequirement);
                }
            }
            if ($form_137 != null) {
                try {
                    $form137File = Requirement::where('student_id', $student_id)
                        ->where('filename', 'form 137')
                        ->where('isSubmitted', 1)
                        ->firstOrFail();
                    $hasFileForm137 = true;
                } catch (ModelNotFoundException $e) {
                    $hasFileForm137 = false;
                    $form_137extention = $form_137->getClientOriginalExtension();
                    //rename file to form_137
                    $form_137filename = 'form 137' . '.' . $form_137extention;
                    $form_137Requirement = [
                        'student_id' => $student_id,
                        'filename' => 'form 137',
                        'filepath' =>  $path . '/' . $form_137filename,
                        'isSubmitted' => 1,
                    ];
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (!file_exists(storage_path('app/' . $path . '/' . $form_137filename))) {
                        //if not exist move file with name of form_137 in folder /uploads/requirements/ + student full name
                        $form_137->storeAs($path, $form_137filename);
                    }
                    Requirement::create($form_137Requirement);
                }
            }
            if ($good_moral != null) {

                try {
                    $goodMoral = Requirement::where('student_id', $student_id)
                        ->where('filename', 'good moral')
                        ->where('isSubmitted', 1)
                        ->firstOrFail();
                    $hasFileGoodMoral = true;
                } catch (ModelNotFoundException $e) {
                    $hasFileGoodMoral = false;
                    $good_moralextention = $good_moral->getClientOriginalExtension();
                    //rename file to good_moral
                    $good_moralfilename = 'good moral' . '.' . $good_moralextention;
                    $good_moralRequirement = [
                        'student_id' => $student_id,
                        'filename' => 'good moral',
                        'filepath' =>  $path . '/' . $good_moralfilename,
                        'isSubmitted' => 1,
                    ];
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (!file_exists(storage_path('app/' . $path . '/' . $good_moralfilename))) {
                        //if not exist move file with name of good_moral in folder /uploads/requirements/ + student full name
                        $good_moral->storeAs($path, $good_moralfilename);
                    }
                    Requirement::create($good_moralRequirement);
                }
            }
            if ($photo != null) {
                try {
                    $studentPhoto = Requirement::where('student_id', $student_id)
                        ->where('filename', 'photo')
                        ->where('isSubmitted', 1)
                        ->firstOrFail();
                    $hasFilePhoto = true;
                } catch (ModelNotFoundException $e) {
                    $hasFilePhoto = false;
                    $photoextention = $photo->getClientOriginalExtension();
                    //rename file to photo
                    $photofilename = 'photo' . '.' . $photoextention;
                    $photoRequirement = [
                        'student_id' => $student_id,
                        'filename' => 'photo',
                        'filepath' =>  $path . '/' . $photofilename,
                        'isSubmitted' => 1,
                    ];
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (!file_exists(storage_path('app/' . $path . '/' . $photofilename))) {
                        //if not exist move file with name of photo in folder /uploads/requirements/ + student full name
                        $photo->storeAs($path, $photofilename);
                    }
                    Requirement::create($photoRequirement);
                }
            }

            return 1;
        } catch (\Throwable $th) {
            alert()->error('ErrorAlert', $th->getMessage());
            return 0;
        }
    }

    public static function old($path, $student_id, $form_137)
    {
        $hasFileForm137 = false;
        try {
            if ($form_137 != null) {
                try {
                    $form137File = Requirement::where('student_id', $student_id)
                        ->where('filename', 'form 137')
                        ->where('isSubmitted', 1)
                        ->firstOrFail();
                    $hasFileForm137 = true;
                } catch (ModelNotFoundException $e) {
                    $hasFileForm137 = false;
                    $form_137extention = $form_137->getClientOriginalExtension();
                    //rename file to form_137
                    $form_137filename = 'form 137' . '.' . $form_137extention;
                    $form_137Requirement = [
                        'student_id' => $student_id,
                        'filename' => 'form 137',
                        'filepath' =>  $path . '/' . $form_137filename,
                        'isSubmitted' => 1,
                    ];
                    //check if file is in folder /uploads/requirements/ + student full name
                    if (!file_exists(storage_path('app/' . $path . '/' . $form_137filename))) {
                        //if not exist move file with name of form_137 in folder /uploads/requirements/ + student full name
                        $form_137->storeAs($path, $form_137filename);
                    }
                    Requirement::create($form_137Requirement);
                }
            }
            return 1;
        } catch (\Throwable $th) {
            alert()->error('ErrorAlert', $th->getMessage());
            return 0;
        }
    }
    public static function pop($path, $payment_id, $pop)
    {
        try {
            $payment = PaymentLog::where('payment_id', '=', $payment_id)->latest('id')->first();
            $proof = 'proof-of-payment.' . $pop->getClientOriginalExtension();
            if (!file_exists(storage_path('app/' . $path . '/' . $proof))) {
                $pop->storeAs($path, $proof);
            }
            $payment->pop = 'proof-of-payment';
            $payment->path = $path . '/' . $proof;
            $payment->save();
        } catch (\Throwable $th) {
            alert()->error('Error', $th->getMessage());
            dd($th);
            return 0;
        }
    }
}
