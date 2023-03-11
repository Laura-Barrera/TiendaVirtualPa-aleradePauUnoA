<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\ShippingOrder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Factory;

class SalesManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(): \Illuminate\Contracts\View\Factory|View|Application
    {
        #return view('components.saleManagement.index', $data)->with(['CustomerDocument' => $data->customer->documentNumber], ['CustomerName'=> $data->customer->name]);
        $data['shipping_order'] = ShippingOrder::all()->where('saleStatus', '=', true);
        return view('components.saleManagement.index', $data);
    }
    public function details(Sale $sale): Factory|View|Application
    {
        $data['details'] = OrderDetail::all()->where('sale_id', '=', $sale->getAttribute('id'));
        return view('components.details.index', $data);
    }

}
