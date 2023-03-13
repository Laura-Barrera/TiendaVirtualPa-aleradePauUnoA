<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function getStart(){
        return view('components.welcome.start');
    }

    function getStartAbout(){
        return view('components.about.startabout');
    }

    function getStartCatalogue(){
        return view('components.catalogue.startcatalogue');
    }
}
