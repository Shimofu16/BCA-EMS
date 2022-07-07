<?php

namespace Database\Seeders;

use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
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
            ['student_id' => 1, 'balance' => 5000, 'reminder_at' => now()->addMonth(1),  'grade_level_id' => 1, 'created_at' => now()],
            ['student_id' => 2, 'balance' => 5000, 'reminder_at' => now()->addYear(1),  'grade_level_id' => 1, 'created_at' => now()],
            ['student_id' => 3, 'balance' => 5000, 'reminder_at' => now()->addMonth(1),  'grade_level_id' => 1, 'created_at' => now()],
        ];
        foreach ($payments as $payment) {
            Payment::create($payment);
        }
        $logs = [
            ['payment_id' => 1, 'mop' => 'Cash', 'payment_method' => 'Monthly', 'amount' => 0, 'created_at' => now()],
            ['payment_id' => 2, 'mop' => 'Cash', 'payment_method' => 'Monthly', 'amount' => 0, 'created_at' => now()],
            ['payment_id' => 3, 'mop' => 'Cash', 'payment_method' => 'Annual', 'amount' => 0, 'created_at' => now()],
        ];
        foreach ($logs as $log) {
            PaymentLog::create($log);
        }
    }
}
