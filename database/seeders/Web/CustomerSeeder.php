<?php

namespace Database\Seeders\Web;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer([
            'name' => 'Cliente',
            'lastName' => 'Tienda física',
            'documentType' => 'Cedula de ciudadania',
            'documentNumber' => 0,
            'phoneNumber' => 0,
            'address' => 'Calle 14 # 11 - 73',
            'email' => 'pauAdmin@gmail.com'
        ]);
        $customer->save();
    }
}
