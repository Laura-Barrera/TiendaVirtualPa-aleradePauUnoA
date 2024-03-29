<?php

namespace Database\Seeders;

use Database\Seeders\Web\CategorySeeder;
use Database\Seeders\Web\CustomerSeeder;
use Database\Seeders\Web\PaymentMethodSeeder;
use Database\Seeders\Web\ProductSeeder;
use Database\Seeders\Web\RolSeeder;
use Database\Seeders\Web\ShippingOrdersSeeder;
use Database\Seeders\Web\UserSeeder;
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
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ShippingOrdersSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
