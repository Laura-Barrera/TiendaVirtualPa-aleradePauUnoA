<?php

namespace Database\Seeders\Web;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User([
            'email' => 'pauAdmin@gmail.com',
            'password' => bcrypt('admin123'),
            'rol_id' => 1
        ]);
        $user->save();
    }
}
