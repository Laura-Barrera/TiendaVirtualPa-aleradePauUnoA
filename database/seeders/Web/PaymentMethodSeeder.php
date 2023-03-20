<?php

namespace Database\Seeders\Web;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethod = new PaymentMethod([
            'nameMethod' => 'Efectivo',
            'additionalCost' => 0
        ]);
        $paymentMethod->save();
    }
}
