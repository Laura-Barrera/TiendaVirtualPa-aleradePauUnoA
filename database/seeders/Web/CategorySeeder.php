<?php

namespace Database\Seeders\Web;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categoryOne = new Category([
            'name' => 'Accesorios',
            'description' => 'Artículos  para complementar la ropa y el cuidado de los bebés'
        ]);
        $categoryOne->save();

        $categoryTwo = new Category([
            'name' => 'Elementos de aseo',
            'description' => 'Productos para mantener la higiene y el cuidado de la piel y el cabello de los bebés'
        ]);
        $categoryTwo->save();

        $categoryThree = new Category([
            'name' => 'Pañales',
            'description' => 'Productos para contener los desechos corporales del bebé y mantenerlo seco y cómodo'
        ]);
        $categoryThree->save();

        $categoryFour = new Category([
            'name' => 'Ropa para bebe',
            'description' => 'Ropa confeccionada con materiales suaves, cómodos y seguros para la piel de bebe.'
        ]);
        $categoryFour->save();

        $categoryFive = new Category([
            'name' => 'Ropa para niñas',
            'description' => 'Prendas desde vestidos hasta pantalones, blusas y faldas. Con divertidos estilos y patrones'
        ]);
        $categoryFive->save();

        $categorySix = new Category([
            'name' => 'Ropa para niños',
            'description' => 'Amplia variedad de prendas, como camisetas, pantalones, shorts, faldas, vestidos, suéteres, chaquetas y abrigos.'
        ]);
        $categorySix->save();

        $categorySeven = new Category([
            'name' => 'Zapatos',
            'description' => 'Zapatos cómodos, flexibles y resistentes para realizar actividades como correr, saltar y jugar sin restricciones. Disponibles para bebes, niños y niñas.'
        ]);
        $categorySeven->save();
    }
}
