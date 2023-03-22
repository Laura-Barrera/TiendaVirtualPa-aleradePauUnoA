<?php

namespace Database\Seeders\Web;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = new Product([
            'name' => 'Kit cortauñas niño',
            'description' => 'Cualquier cosa',
            'price' => 10000,
            'stockAmount' => 50,
            'referenceNumber' => 'kit-1',
            'iva' => 19.5,
            'image' => 'uploads/Kitcortauñasniño.jpeg',
            'category_id' => 1]);
        $product1->save();
    }
}
