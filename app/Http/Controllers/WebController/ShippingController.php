<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    function getInformationCustomer(){
        return view('components.sale.information');
    }

    function getInformationAddress(){
        return view('components.sale.address');
    }

    function getPaymentMethod(){
        return view('components.sale.paymentMethod');
    }

    function getErrorPayment(){
        return view('components.welcome.order')->with('message', 'errorPayment');
    }

    function getPendingPayment(){
        return view('components.welcome.order')->with('message', 'pendingPayment');
    }

    function getSuccessfulPayment(){
        return view('components.welcome.order')->with('message', 'successfulDelivery');
    }
}
