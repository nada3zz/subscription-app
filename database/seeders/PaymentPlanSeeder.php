<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentPlan\PaymentPlan;

class PaymentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentPlan::create([
            'name' => 'Monthly',
            'price' => 10,
        ]);
        PaymentPlan::create([
            'name' => 'Yearly',
            'price' => 90,
        ]);
    }
}
