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
        //Categoria de accesorios
        $product1 = new Product([
            'name' => 'Biberon AVENT 11 onzas',
            'description' => 'Biberon AVENT anticolico y antireflujo para bebes mayores de 6 meses',
            'price' => 37600,
            'stockAmount' => 4,
            'referenceNumber' => 'AC-1',
            'iva' => 1.16,
            'image' => 'uploads/1Avent11onz.jpg',
            'category_id' => 1
        ]);
        $product1->save();

        $product2 = new Product([
            'name' => 'Cobija Ovejera Niño',
            'description' => 'Cobija ovejera para niño con un tamaño de 92 cm x 82 cm',
            'price' => 25000,
            'stockAmount' => 5,
            'referenceNumber' => 'AC-2',
            'iva' => 1.16,
            'image' => 'uploads/1CobijaOvejeraNiño.jpg',
            'category_id' => 1
        ]);
        $product2->save();

        $product3 = new Product([
            'name' => 'Kit Cortauñas Niña',
            'description' => 'Kit de cortauñas y elementos de cuidado para el bebe Mother & Baby. Contiene: Cepillo, peine, termometro, aspirador nasal, cepillo silicona y juego de manicura',
            'price' => 30000,
            'stockAmount' => 2,
            'referenceNumber' => 'AC-3',
            'iva' => 1.16,
            'image' => 'uploads/1KitCortauñasNiña.jpg',
            'category_id' => 1
        ]);
        $product3->save();

        $product4 = new Product([
            'name' => 'Kit Cortauñas Niño',
            'description' => 'Kit de cortauñas y elementos de cuidado para el bebe Mother & Baby. Contiene: Cepillo, peine, termometro, aspirador nasal, cepillo silicona y juego de manicura',
            'price' => 30000,
            'stockAmount' => 3,
            'referenceNumber' => 'AC-4',
            'iva' => 1.16,
            'image' => 'uploads/1KitCortauñasNiño.jpg',
            'category_id' => 1
        ]);
        $product4->save();

        $product5 = new Product([
            'name' => 'Toalla para baño Niña',
            'description' => 'Toalla para baño para niña más tres limpiababitas',
            'price' => 17500,
            'stockAmount' => 2,
            'referenceNumber' => 'AC-5',
            'iva' => 1.16,
            'image' => 'uploads/1ToallaNiña.jpg',
            'category_id' => 1
        ]);
        $product5->save();

        //Categoria de Elementos de aseo
        $product6 = new Product([
            'name' => 'Kit Baby Shower Arrurru Niña',
            'description' => 'Kit de aseo para niña arrurru. Contiene: Crema antipañalitis, shampoo, baño liquido, crema para el cuerpo y colonia',
            'price' => 31700,
            'stockAmount' => 3,
            'referenceNumber' => 'EA-1',
            'iva' => 1.19,
            'image' => 'uploads/2KitArrurruNiña.jpg',
            'category_id' => 2
        ]);
        $product6->save();

        $product7 = new Product([
            'name' => 'Kit Abuelita Arrurru Niño',
            'description' => 'Kit de aseo para niño arrurru. Contiene: Crema antipañalitis, shampoo, baño liquido, crema para el cuerpo y colonia',
            'price' => 33000,
            'stockAmount' => 2,
            'referenceNumber' => 'EA-2',
            'iva' => 1.19,
            'image' => 'uploads/2KitArrurruNiño.jpg',
            'category_id' => 2
        ]);
        $product7->save();

        $product8 = new Product([
            'name' => 'Kit Recien Nacido Arrurru',
            'description' => 'Kit de aseo para recien nacido arrurru. Contiene: Shampoo y baño liquido, colonia, crema antipañalitis y un obsequio',
            'price' => 28300,
            'stockAmount' => 2,
            'referenceNumber' => 'EA-3',
            'iva' => 1.19,
            'image' => 'uploads/2KitArrurruRN.jpg',
            'category_id' => 2
        ]);
        $product8->save();

        $product9 = new Product([
            'name' => 'Kit de Aseo J&J',
            'description' => 'Kit de aseo para bebe J&J. Contiene: Jabón, shampoo y crema para el cuerpo',
            'price' => 25700,
            'stockAmount' => 2,
            'referenceNumber' => 'EA-4',
            'iva' => 1.19,
            'image' => 'uploads/2KitJ&JPequeño.jpg',
            'category_id' => 2
        ]);
        $product9->save();

        $product10 = new Product([
            'name' => 'Tina grande con soporte',
            'description' => 'Tina grande para bebe con soporte plastico',
            'price' => 27000,
            'stockAmount' => 10,
            'referenceNumber' => 'EA-5',
            'iva' => 1.19,
            'image' => 'uploads/2Tinagrande.jpg',
            'category_id' => 2
        ]);
        $product10->save();

        //Categoria de pañales y pañitos
        $product11 = new Product([
            'name' => 'Kit RN Winny',
            'description' => 'Kit de winny para recien nacido. Contiene: 30 pañales winny gold etapa 0, 80 toallitas winny sensitive, 1 crema de calendula N°4, y 1 guia para cuidado del bebe',
            'price' => 27400,
            'stockAmount' => 12,
            'referenceNumber' => 'PN-1',
            'iva' => 1.5,
            'image' => 'uploads/3KitRNWinny.jpg',
            'category_id' => 3
        ]);
        $product11->save();

        $product13 = new Product([
            'name' => 'Toallitas Humedas Winny x 100',
            'description' => 'Toallitas humedas winny natural x 100 con aloe vera y vitamina E',
            'price' => 6100,
            'stockAmount' => 35,
            'referenceNumber' => 'PN-2',
            'iva' => 1.5,
            'image' => 'uploads/3ToallitasWinnyx100.jpg',
            'category_id' => 3
        ]);
        $product13->save();

        $product13 = new Product([
            'name' => 'Winny et 1 x 30',
            'description' => 'Paquete de pañales winny etapa 1 x 30 + 20 toallitas sensitive',
            'price' => 15400,
            'stockAmount' => 16,
            'referenceNumber' => 'PN-3',
            'iva' => 1.5,
            'image' => 'uploads/3Winny1x30.png',
            'category_id' => 3
        ]);
        $product13->save();

        $product14 = new Product([
            'name' => 'Winny et 2 x 30',
            'description' => 'Paquete de pañales winny etapa 2 x 30 + 20 toallitas natural',
            'price' => 18400,
            'stockAmount' => 28,
            'referenceNumber' => 'PN-4',
            'iva' => 1.5,
            'image' => 'uploads/3Winny2x30.png',
            'category_id' => 3
        ]);
        $product14->save();

        $product15 = new Product([
            'name' => 'Winny RN x 30',
            'description' => 'Paquete de pañales winny gold etapa 0 x 30 + 20 toallitas sensitive',
            'price' => 13800,
            'stockAmount' => 10,
            'referenceNumber' => 'PN-5',
            'iva' => 1.5,
            'image' => 'uploads/3WinnyRN30.png',
            'category_id' => 3
        ]);
        $product15->save();

        //Categoria Ropa para bebe
        $product16 = new Product([
            'name' => 'Media x 3 Niña',
            'description' => 'Medias carter x 3 para niña de 0 a 12 meses',
            'price' => 7000,
            'stockAmount' => 24,
            'referenceNumber' => 'RB-1',
            'iva' => 1.7,
            'image' => 'uploads/4Medias0-6Niña.jpg',
            'category_id' => 4
        ]);
        $product16->save();

        $product17 = new Product([
            'name' => 'Media x 3 Niño',
            'description' => 'Medias carter x 3 para niño de 0 a 12 meses',
            'price' => 7000,
            'stockAmount' => 18,
            'referenceNumber' => 'RB-2',
            'iva' => 1.7,
            'image' => 'uploads/4Medias0-6Niño.jpg',
            'category_id' => 4
        ]);
        $product17->save();

        $product18 = new Product([
            'name' => 'Primera Muda Caja',
            'description' => 'Primera Muda para bebe en caja. Contiene: Saco, esqueleto, pantalon, gorro, cobertor, babero y accesorios adicionales',
            'price' => 13000,
            'stockAmount' => 3,
            'referenceNumber' => 'RB-3',
            'iva' => 1.6,
            'image' => 'uploads/4PrimeraMudaCaja.jpg',
            'category_id' => 4
        ]);
        $product18->save();

        $product19 = new Product([
            'name' => 'Primera Muda Cofre',
            'description' => 'Primera Muda para bebe en cofre. Contiene: Conjunto completo, cobertor, toalla, limpiababitas, gorro, mitones, pijama y limpiababitas',
            'price' => 29000,
            'stockAmount' => 5,
            'referenceNumber' => 'RB-4',
            'iva' => 1.6,
            'image' => 'uploads/4PrimeraMudaCofre.jpg',
            'category_id' => 4
        ]);
        $product19->save();

        $product20 = new Product([
            'name' => 'Primera Muda Panda',
            'description' => 'Primera Muda para bebe con motivo panda. Contiene: Conjunto completo, cobertor, gorro, pijama y body',
            'price' => 18000,
            'stockAmount' => 2,
            'referenceNumber' => 'RB-5',
            'iva' => 1.6,
            'image' => 'uploads/4PrimeraMudaPanda.jpg',
            'category_id' => 4
        ]);
        $product20->save();

        //Categoria Ropa para niña
        $product21 = new Product([
            'name' => 'Chaqueta Nautica Niña',
            'description' => 'Chaqueta acolchada niña tipo gaban T4',
            'price' => 30000,
            'stockAmount' => 2,
            'referenceNumber' => 'RNA-1',
            'iva' => 1.8,
            'image' => 'uploads/5Chaqueta.jpg',
            'category_id' => 5
        ]);
        $product21->save();

        $product22 = new Product([
            'name' => 'Conjunto Baby Sueños Niña Buzo T2',
            'description' => 'Conjunto para niña x 3. Contiene: Buzo, esqueleto y pantalón tipo jean',
            'price' => 25000,
            'stockAmount' => 2,
            'referenceNumber' => 'RNA-2',
            'iva' => 1.8,
            'image' => 'uploads/5ConjuntoBuso.jpg',
            'category_id' => 5
        ]);
        $product22->save();

        $product23 = new Product([
            'name' => 'Conjunto Baby Sueños Niña Jardinera T2',
            'description' => 'Conjunto para niña x 3 en algodón. Contiene: Jardinera, leggis y camibuzo',
            'price' => 22000,
            'stockAmount' => 2,
            'referenceNumber' => 'RNA-3',
            'iva' => 1.8,
            'image' => 'uploads/5ConjuntoJardinera.jpg',
            'category_id' => 5
        ]);
        $product23->save();

        $product24 = new Product([
            'name' => 'Conjunto Baby Sueños Niña T2',
            'description' => 'Conjunto para niña x 3. Contiene: Buzo con arandela, esqueleto y pantalón tipo jean',
            'price' => 22000,
            'stockAmount' => 3,
            'referenceNumber' => 'RNA-4',
            'iva' => 1.8,
            'image' => 'uploads/5ConjuntoJardineraJean.jpg',
            'category_id' => 5
        ]);
        $product24->save();

        $product25 = new Product([
            'name' => 'Conjunto Baby Sueños Niña Sudadera T2',
            'description' => 'Sudadera para niña x 3 en algodon. Contiene: Chaqueta, camiseta y pantalón',
            'price' => 25000,
            'stockAmount' => 2,
            'referenceNumber' => 'RNA-5',
            'iva' => 1.8,
            'image' => 'uploads/5ConjuntoSudadera.jpg',
            'category_id' => 5
        ]);
        $product25->save();

        //Categoria Ropa para niño
        $product26 = new Product([
            'name' => 'Conjunto Baby Sueños Niño Buzo T2',
            'description' => 'Conjunto para niño x 3 en algodon. Contiene: Buzo, esqueleto y pantalón',
            'price' => 25000,
            'stockAmount' => 2,
            'referenceNumber' => 'RNO-1',
            'iva' => 1.8,
            'image' => 'uploads/6ConjuntoBuso.jpg',
            'category_id' => 6
        ]);
        $product26->save();

        $product27 = new Product([
            'name' => 'Conjunto Baby Sueños Niño Camibuzo T4',
            'description' => 'Conjunto para niño x 3. Contiene: Buzo con capota, camiseta y pantalón tipo jean',
            'price' => 28000,
            'stockAmount' => 3,
            'referenceNumber' => 'RNO-2',
            'iva' => 1.8,
            'image' => 'uploads/6ConjuntoCamisa.jpg',
            'category_id' => 6
        ]);
        $product27->save();

        $product28 = new Product([
            'name' => 'Conjunto Baby Sueños Niña Chaqueta T4',
            'description' => 'Conjunto para niño x 3. Contiene: Chaqueta nautica, esqueleto y pantalón tipo jean',
            'price' => 28000,
            'stockAmount' => 2,
            'referenceNumber' => 'RNO-3',
            'iva' => 1.8,
            'image' => 'uploads/6ConjuntoChaqueta.jpg',
            'category_id' => 6
        ]);
        $product28->save();

        $product29 = new Product([
            'name' => 'Conjunto Baby Sueños Niño Jean T2',
            'description' => 'Conjunto para niño x 3. Contiene: Chaqueta, camiseta y pantalón tipo jean',
            'price' => 25000,
            'stockAmount' => 3,
            'referenceNumber' => 'RNO-4',
            'iva' => 1.8,
            'image' => 'uploads/6ConjuntoJean.jpg',
            'category_id' => 6
        ]);
        $product29->save();

        $product30 = new Product([
            'name' => 'Conjunto Matinero T2',
            'description' => 'Conjunto marinero para niño. Contiene: Marinero, camiseta y cachucha',
            'price' => 20000,
            'stockAmount' => 4,
            'referenceNumber' => 'RNO-5',
            'iva' => 1.8,
            'image' => 'uploads/6Marinero.jpg',
            'category_id' => 6
        ]);
        $product30->save();

        //Categoria Zapatos
        $product31 = new Product([
            'name' => 'Botas niño NT T20',
            'description' => 'Botas No Tuerce tipo Brahama para niño color amarillo',
            'price' => 25000,
            'stockAmount' => 2,
            'referenceNumber' => 'ZP-1',
            'iva' => 1.12,
            'image' => 'uploads/7BrahamaNiñoNT.jpg',
            'category_id' => 7
        ]);
        $product31->save();

        $product32 = new Product([
            'name' => 'Zapato Charol para niña T15',
            'description' => 'Zapatos para niña bebe color rojo, beige, blanco, rosa, negro',
            'price' => 16072,
            'stockAmount' => 12,
            'referenceNumber' => 'ZP-2',
            'iva' => 1.12,
            'image' => 'uploads/7CharolNiñaBebe.jpg',
            'category_id' => 7
        ]);
        $product32->save();

        $product33 = new Product([
            'name' => 'Zapato Charon NT niña T18',
            'description' => 'Zapatos tipo charol color negro para niña',
            'price' => 25000,
            'stockAmount' => 3,
            'referenceNumber' => 'ZP-3',
            'iva' => 1.12,
            'image' => 'uploads/7CharolNiñaNT.jpg',
            'category_id' => 7
        ]);
        $product33->save();

        $product34 = new Product([
            'name' => 'Tenis NT niña T19',
            'description' => 'Tenis tipo adidas para niña color blanco, rosado y gris',
            'price' => 25000,
            'stockAmount' => 2,
            'referenceNumber' => 'ZP-4',
            'iva' => 1.12,
            'image' => 'uploads/7TenisNiñaNT.jpg',
            'category_id' => 7
        ]);
        $product34->save();

        $product35 = new Product([
            'name' => 'Tenis NT niño T21',
            'description' => 'Tenis tipo converse para niño color azul',
            'price' => 25000,
            'stockAmount' => 4,
            'referenceNumber' => 'ZP-5',
            'iva' => 1.12,
            'image' => 'uploads/7TenisNiñoNT.jpg',
            'category_id' => 7
        ]);
        $product35->save();
    }
}
