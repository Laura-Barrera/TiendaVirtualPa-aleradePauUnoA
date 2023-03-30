<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private function validateStock(Product $product): bool
    {
        return ($product->getAttribute('stockAmount') - 1) >= 0;
    }
    public function addProduct(Product $product): RedirectResponse
    {
        $category = $product->getAttribute('category_id');
        $result = $this->validateStock($product);

        if (!$result) {
            return redirect()->route('makeOrder', $category)->with('errorMessage', 'stockError');
        }

        return $this->addToTheList($product);
    }

    private function addToTheList(Product $product): RedirectResponse
    {
        $category = $product->getAttribute('category_id');
        $listOfProducts = $this->getListProducts();

        foreach ($listOfProducts as $item) {
            if ($item->id == $product->getAttribute('id')) {

                if (($item->stockAmount + 1) > $product->getAttribute('stockAmount')) {
                    return redirect()->route('makeOrder', $category)->with('errorMessage', 'stockError');
                }

                $item->stockAmount = ($item->stockAmount + 1);

                return redirect()->route('makeOrder', $category);
            }
        }

        $item = $product;
        $item->setAttribute('stockAmount', 1);

        array_push($listOfProducts, $product);
        $this->saveProducts($listOfProducts);

        return redirect()->route('makeOrder', $category);
    }
}
