<?php

namespace Database\Seeders;

use App\Models\Registrar\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['subject' => 'Math', 'grade_level_id' => 1, 'created_at' => now()],
            ['subject' => 'Filipino', 'grade_level_id' => 1, 'created_at' => now()],
            ['subject' => 'P.E', 'grade_level_id' => 1, 'created_at' => now()],
            ['subject' => 'Math', 'grade_level_id' => 2, 'created_at' => now()],
            ['subject' => 'Filipino', 'grade_level_id' => 2, 'created_at' => now()],
            ['subject' => 'P.E', 'grade_level_id' => 2, 'created_at' => now()],
        ];
        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
