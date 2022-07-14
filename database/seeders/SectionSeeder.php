<?php

namespace Database\Seeders;

use App\Models\Registrar\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            ['section_name' => 'Loyal', 'grade_level_id' => 1, 'created_at' => now()],
            ['section_name' => 'Happiness', 'grade_level_id' => 2, 'created_at' => now()],
            ['section_name' => 'Faith', 'grade_level_id' => 3, 'created_at' => now()],
            ['section_name' => 'Love', 'grade_level_id' => 4, 'created_at' => now()],
            ['section_name' => 'Trustworthy', 'grade_level_id' => 5, 'created_at' => now()],
            ['section_name' => 'Honesty', 'grade_level_id' => 6, 'created_at' => now()],
            ['section_name' => 'Courage', 'grade_level_id' => 7, 'created_at' => now()],
            ['section_name' => 'Humility', 'grade_level_id' => 8, 'created_at' => now()],
            ['section_name' => 'Charity', 'grade_level_id' => 9, 'created_at' => now()],
            ['section_name' => 'Patience', 'grade_level_id' => 10, 'created_at' => now()],
            ['section_name' => 'Obedience', 'grade_level_id' => 11, 'created_at' => now()],
            ['section_name' => 'Integrity', 'grade_level_id' => 12, 'created_at' => now()],
            ['section_name' => 'Wisdom', 'grade_level_id' => 13, 'created_at' => now()],
            ['section_name' => 'Loyal', 'grade_level_id' => 14, 'created_at' => now()],
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
