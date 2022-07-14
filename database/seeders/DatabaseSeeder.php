<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TeacherSeeder::class,
            GradeLevelSeeder::class,
            SubjectSeeder::class,
            SectionSeeder::class,
            SchoolYearSeeder::class,
            StudentSeeder::class,
            UserSeeder::class,
            EventSeeder::class,
            PaymentSeeder::class,
            EnrollmentLogSeeder::class,
        ]);
    }
}
