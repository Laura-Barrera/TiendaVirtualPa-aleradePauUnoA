<?php

namespace Database\Seeders;

use Database\Seeders\Web\RolSeeder;
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
    }
}
