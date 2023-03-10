<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\ShippingOrder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Factory;

class ShippingManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(): \Illuminate\Contracts\View\Factory|View|Application
    {
        $data['shipping_order'] = ShippingOrder::all();
        #return view('components.shippingManagement.index', $data)->with(['CustomerDocument' => $data->customer->documentNumber], ['CustomerName'=> $data->customer->name]);
        return view('components.shippingManagement.index', $data);
    }
    public function details(ShippingOrder $shippingOrder): Factory|View|Application
    {
        $data['details'] = OrderDetail::all()->where('domicile_sale_id', '=', $shippingOrder->getAttribute('id'));
        return view('components.details.index', $data);
    }

}
