<?php

namespace Database\Seeders;

use App\Models\Registrar\EnrollmentLog;
use App\Models\Registrar\SchoolYear;
use Illuminate\Database\Seeder;

class EnrollmentLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'student_id' => '2022-00001-CL-0',
                'last_name' => 'Tamad',
                'first_name' => 'Juan',
                'middle_name' => 'Dy',
                'gender' => 'Male',
                'age' => '3',
                'email' => 'juantamad@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'grade_level_id' => 1,
                'section_id' => 1,
                'sy_id' => SchoolYear::where('id', '=', 1)->first()->id,
                'status' => 0,
                'isDone' => 1,
                'student_type' => 'Old Student',
                'hasVerifiedEmail' => 1,
                'balance' => 5000, 'reminder_at' => now()->addMonth(1),
                'created_at' => now(),
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'last_name' => 'Pontanoza',
                'first_name' => 'Ma. Moureen',
                'middle_name' => 'Lubrin',
                'gender' => 'Female',
                'age' => '3',
                'email' => 'mamoureenpontanoza@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'status' => 0, //not enrolled
                'student_type' => 'Old Student',
                'hasVerifiedEmail' => 1,
                'grade_level_id' => 2,
                'isDone' => 1,
                'sy_id' => SchoolYear::where('id', '=', 1)->first()->id,
                'balance' => 5000, 'reminder_at' => now()->addMonth(1),
                'created_at' => now(),
            ],
            [
                'student_id' => '2022-00002-CL-0',
                'last_name' => 'Albaytar',
                'first_name' => 'Paul Aedrian',
                'middle_name' => 'R',
                'gender' => 'Male',
                'age' => 3,
                'email' => 'albaytarpaulaedrian@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'status' => 0, //not enrolled
                'student_type' => 'New Student',
                'grade_level_id' => 3,
                'isDone' => 1,
                'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id,
                'status' => 0,
                'hasVerifiedEmail' => 1,
                'balance' => 5000, 'reminder_at' => now()->addMonth(1),
                'created_at' => now(),
            ],
            [
                'student_id' => '2022-00004-CL-0',
                'last_name' => 'Latayan',
                'first_name' => 'Roy Joseph',
                'middle_name' => 'Mendoza',
                'gender' => 'Male',
                'age' => 21,
                'email' => 'royjosephlatayan0816@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'status' => 0, //not enrolled
                'student_type' => 'Old Student',
                'grade_level_id' => 3,
                'sy_id' => SchoolYear::where('id', '=', 1)->first()->id,
                'isDone' => 1,
                'hasVerifiedEmail' => 1,
                'balance' => 5000, 'reminder_at' => now()->addMonth(1),
                'created_at' => now(),
            ],
            [
                'student_id' => '2022-00001-CL-0',
                'last_name' => 'Tamad',
                'first_name' => 'Juan',
                'middle_name' => 'Dy',
                'gender' => 'Male',
                'age' => '3',
                'email' => 'juantamad@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'grade_level_id' => 2,
                'section_id' => 1,
                'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id,
                'status' => 1,
                'isDone' => 1,
                'student_type' => 'Old Student',
                'hasVerifiedEmail' => 1,
                'balance' => 5000, 'reminder_at' => now()->addMonth(1),
                'created_at' => now(),
            ],
            [
                'student_id' => '2022-00004-CL-0',
                'last_name' => 'Latayan',
                'first_name' => 'Roy Joseph',
                'middle_name' => 'Mendoza',
                'gender' => 'Male',
                'age' => 21,
                'email' => 'royjosephlatayan0816@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'status' => 0, //not enrolled
                'student_type' => 'Old Student',
                'grade_level_id' => 3,
                'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id,
                'status' => 0,
                'isDone' => 1,
                'hasVerifiedEmail' => 1,
                'balance' => 5000, 'reminder_at' => now()->addMonth(1),
                'created_at' => now(),
            ],
        ];
        foreach ($students as $student) {
            EnrollmentLog::create($student);
        }
    }
}
