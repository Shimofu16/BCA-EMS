<?php

namespace Database\Seeders;

use App\Models\Registrar\Family;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
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
                'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id,
                'status' => 1,
                'isDone' => 1,
                'student_type' => 'Old Student',
                'hasVerifiedEmail' => 1,
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
                'section_id' => 1,  'isDone' => 1,
                'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id,
                'created_at' => now(),
            ], [
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
                'grade_level_id' => 3,  'isDone' => 1,
                'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id,
                'status' => 0,
                'hasVerifiedEmail' => 1,
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
                'status' => 0,  'isDone' => 1,
                'hasVerifiedEmail' => 1,
                'created_at' => now(),
            ],
        ];
        foreach ($students as $student) {
            Student::create($student);
        }
        $families = [
            [
                'student_id' => '2022-00001-CL-0',
                'name' => 'Dino Sy Tamad',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship' => 'Father',
                'relationship_type' => 'father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00001-CL-0',
                'name' => 'Gina Dy Tamad',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship' => 'Mother',
                'relationship_type' => 'mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00001-CL-0',
                'name' => 'Gina Dy Tamad 2',
                'relationship_type' => 'guardian',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'address' => 'Brgy. Pook 1, Calauan Laguna',
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'name' => 'Dino Sy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship_type' => 'father',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'name' => 'Gina Dy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship_type' => 'mother',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'name' => 'Gina Dy Tamad 2',
                'relationship_type' => 'guardian',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'address' => 'brgy imok, Calauan, Laguna',
            ], [
                'student_id' => '2022-00002-CL-0',
                'name' => 'Dino Sy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship_type' => 'father',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00002-CL-0',
                'name' => 'Gina Dy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship_type' => 'mother',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00002-CL-0',
                'name' => 'Gina Dy Tamad 2',
                'relationship_type' => 'guardian',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'address' => 'brgy imok, Calauan, Laguna',
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'name' => 'Dino Sy Tamad 3',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship_type' => 'father',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'name' => 'Gina Dy Tamad 3',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship_type' => 'mother',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'name' => 'Gina Dy Tamad 3',
                'relationship_type' => 'guardian',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'address' => 'brgy imok, Calauan, Laguna',
            ], [
                'student_id' => '2022-00002-CL-0',
                'name' => 'Dino Sy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship_type' => 'father',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00002-CL-0',
                'name' => 'Gina Dy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship_type' => 'mother',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_id' => '2022-00002-CL-0',
                'name' => 'Gina Dy Tamad 2',
                'relationship_type' => 'guardian',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'address' => 'brgy imok, Calauan, Laguna',
            ],
            [
                'student_id' => '2022-00004-CL-0',
                'name' => 'Rolando Latayan',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'rolandolatayan@gmail.com',
                'relationship_type' => 'father',
                'relationship' => 'Father',
                'occupation' => 'Driver',
            ],
            [
                'student_id' => '2022-00004-CL-0',
                'name' => 'Fe M. Latayan',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'relationship_type' => 'mother',
                'relationship' => 'Mother',
                'occupation' => 'House Wife',
            ],
            [
                'student_id' => '2022-00004-CL-0',
                'name' => 'Rolando Latayan',
                'relationship_type' => 'guardian',
                'relationship' => 'Father',
                'contact_no' => '09123456789',
                'email' => 'rolandolatayan@gmail.com',
                'address' => 'Lamot 2, Calauan, Laguna',
            ]
        ];

        foreach ($families as $family) {
            Family::create($family);
        }
    }
}
