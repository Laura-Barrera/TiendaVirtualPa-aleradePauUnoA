<?php

namespace Database\Seeders\Web;

use App\Models\ShippingOrder;
use Illuminate\Database\Seeder;

class ShippingOrdersSeeder extends Seeder
{
    public function run()
    {
        $shippingOrderDefault = new ShippingOrder([
            'address' => 'Calle 14 # 11 - 73',
            'city' => 'Sogamoso',
            'department' => 'Boyacá'
        ]);
        $shippingOrderDefault->sale();
    }
}
