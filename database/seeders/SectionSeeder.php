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
            ['section_name' => 'Bakawan 1', 'grade_level_id' => 1, 'created_at' => now()],
            ['section_name' => 'Eros Atalia 1', 'grade_level_id' => 1, 'created_at' => now()],
            ['section_name' => 'Balmaceda 1', 'grade_level_id' => 1, 'created_at' => now()],
            ['section_name' => 'Bakawan 2', 'grade_level_id' => 2, 'created_at' => now()],
            ['section_name' => 'Balmaceda 2', 'grade_level_id' => 2, 'created_at' => now()],
            ['section_name' => 'Eros Atalia 2', 'grade_level_id' => 2, 'created_at' => now()],
            ['section_name' => 'Bakawan 3', 'grade_level_id' => 3, 'created_at' => now()],
            ['section_name' => 'Balmaceda 3', 'grade_level_id' => 3, 'created_at' => now()],
            ['section_name' => 'Eros Atalia 3', 'grade_level_id' => 3, 'created_at' => now()],
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
