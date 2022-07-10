<?php

namespace Database\Seeders;

use App\Models\Admin\AdminAccount;
use App\Models\Registrar\RegistrarAccount;
use App\Models\Student\StudentAccount;
use App\Models\Teacher\TeacherAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminAccount::create(['name' => 'admin', 'email' => 'admin@app.com', 'password' => Hash::make('password'), 'gender' => 'Male',]);
        $users = [
            ['name' => 'Roy Joseph Latayan', 'email' => 'royjosephlatayan16@gmail.com', 'password' => Hash::make('password'), 'isRegistrar' => 1, 'gender' => 'Male', 'created_at' => now()],
            ['name' => 'Moureen Pontanoza', 'email' => 'registrar2@app.com', 'password' => Hash::make('password'), 'isRegistrar' => 1, 'gender' => 'Male', 'created_at' => now()],
            ['name' => 'Paul Aedrian Albaytar', 'email' => 'cashier@app.com', 'password' => Hash::make('password'), 'isRegistrar' => 0, 'gender' => 'Male', 'created_at' => now()],
        ];
        foreach ($users as $user) {
            RegistrarAccount::create($user);
        }
        TeacherAccount::create(
            [
                'name' => 'teacher',
                'email' => 'teacher@app.com',
                'password' => Hash::make('password'),
                'gender' => 'Male',
                'created_at' => now()
            ]
        );

        $students = [
            [
                'student_id' => '2022-00001-CL-0',
                'name' => 'Juan D. Tamad',
                'email' => 'juantamad@gmail.com',
                'password' => Hash::make('password'),
                'gender' => 'Male',
                'created_at' => now()
            ],
            [
                'student_id' => '2022-00003-CL-0',
                'name' => 'Ma. Moureen L. Pontanoza',
                'email' => 'mamoureenpontanoza@gmail.com',
                'password' => Hash::make('password'),
                'gender' => 'Female',
                'created_at' => now()
            ],
            [
                'student_id' => '2022-00004-CL-0',
                'name' => 'Roy Joseph Latayan',
                'email' => 'royjosephlatayan0816@gmail.com',
                'password' => Hash::make('password'),
                'gender' => 'Male',
                'created_at' => now()
            ],
            ];
            foreach ($students as $student) {
                StudentAccount::create($student);
            }
    }
}
