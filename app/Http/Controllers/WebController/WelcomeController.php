<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function getStart(){
        $products =  Product::all();
        return view('components.welcome.start' , ['products' => $products]);
    }

    function getStartAbout(){
        return view('components.welcome.about');
    }

    function getStartCatalogue(){
        $products =  Product::all();
        $categories = Category::all();
        return view('components.catalogue.catalogue', ['products' => $products], ['categories' => $categories]);
    }

    function getOrderDetail(){
        return view('components.welcome.order');
    }

    function showProductsByCategory($category_id)
    {
        $category = Category::findOrFail($category_id);
        $products = Product::where('category_id', $category_id)->get();
        $categories = Category::all();

        return view('components.catalogue.showProductsCategory', compact('category', 'products',
            'categories'));
    }

}
