<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
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
        return view('components.catalogue.startcatalogue', ['products' => $products]);
    }

    function getOrderDetail(){
        return view('components.welcome.order');
    }
}
