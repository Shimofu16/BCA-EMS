<?php

namespace Database\Seeders;

use App\Models\Registrar\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [
            ['name' => 'Roy Joseph M. Latayan', 'gender' => 'Male', 'age' => '26', 'contact' => '09512370553', 'email' => 'royjosephlatayan16@gmail.com', 'created_at' => now()],
            ['name' => 'Moureen L. Potanoza', 'gender' => 'Female', 'age' => '26', 'contact' => '09512370551', 'email' => 'moureenlpontanoza@gmail.com', 'created_at' => now()],
            ['name' => 'Paul Aedrian Albaytan', 'gender' => 'Male', 'age' => '26', 'contact' => '09512370511', 'email' => 'paulaedrianalbaytar@gmail.com', 'created_at' => now()],
        ];
        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
