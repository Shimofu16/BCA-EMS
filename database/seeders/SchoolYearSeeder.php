<?php

namespace Database\Seeders;

use App\Models\Registrar\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sys = [
            ['school_year' => '2020 - 2021', 'created_at' => now()],
            ['school_year' => '2021 - 2022', 'isCurrent' => 1, 'isCurrentViewByRegistrar' => 1, 'isCurrentViewByCashier' => 1, 'isEnrollment' => 1, 'created_at' => now()],
            ['school_year' => '2022 - 2023', 'created_at' => now()],
            ['school_year' => '2023 - 2024', 'created_at' => now()],
        ];
        foreach ($sys as $sy) {
            SchoolYear::create($sy);
        }
    }
}
