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
        return view('components.about.startabout');
    }

    function getStartCatalogue(){
        return view('components.catalogue.startcatalogue');
    }
}
