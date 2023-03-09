<?php

namespace Database\Seeders\Web;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run()
    {
        $rolOne = new Rol([
            'description' => 'administrator'
        ]);

        $rolTwo = new Rol([
            'description' => 'employee'
        ]);

        $rolThree = new Rol([
            'description' => 'client'
        ]);

        $rolOne->save();
        $rolTwo->save();
        $rolThree->save();
    }
}
