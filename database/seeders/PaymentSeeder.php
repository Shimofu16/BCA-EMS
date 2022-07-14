<?php

namespace Database\Seeders;

use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\SchoolYear;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
            ['student_id' => 1, 'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id, 'grade_level_id' => 1, 'mop' => 'Cash', 'payment_method' => 'Monthly', 'amount' => 0, 'created_at' => now()],
            ['student_id' => 2, 'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id, 'grade_level_id' => 2, 'mop' => 'Cash', 'payment_method' => 'Monthly', 'amount' => 0, 'created_at' => now()],
            ['student_id' => 3, 'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id, 'grade_level_id' => 3, 'mop' => 'Cash', 'payment_method' => 'Annual', 'amount' => 0, 'created_at' => now()],
            ['student_id' => 4, 'sy_id' => SchoolYear::where('isCurrent', '=', 1)->first()->id, 'grade_level_id' => 3, 'mop' => 'Cash', 'payment_method' => 'Annual', 'amount' => 0, 'created_at' => now()],
        ];
        foreach ($payments as $payment) {
            Payment::create($payment);
        }
        $data = [
            ['student_id' => 1, 'sy_id' => SchoolYear::where('id', '=', 1)->first()->id, 'grade_level_id' => 1, 'mop' => 'Cash', 'payment_method' => 'Monthly', 'amount' => 0, 'created_at' => now()],
            ['student_id' => 2, 'sy_id' => SchoolYear::where('id', '=', 1)->first()->id, 'grade_level_id' => 2, 'mop' => 'Cash', 'payment_method' => 'Monthly', 'amount' => 0, 'created_at' => now()],
            ['student_id' => 4, 'sy_id' => SchoolYear::where('id', '=', 1)->first()->id, 'grade_level_id' => 3, 'mop' => 'Cash', 'payment_method' => 'Annual', 'amount' => 0, 'created_at' => now()],
        ];
        foreach ($data as $payment) {
            PaymentLog::create($payment);
        }
    }
}
