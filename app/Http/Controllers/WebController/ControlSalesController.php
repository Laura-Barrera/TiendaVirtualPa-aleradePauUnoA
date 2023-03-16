<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\SaleUpdateRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Sale;
use App\Models\ShippingOrder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\Factory;

class ControlSalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexRealizedSales(): \Illuminate\Contracts\View\Factory|View|Application
    {
        #return view('components.saleManagement.index', $data)->with(['CustomerDocument' => $data->customer->documentNumber], ['CustomerName'=> $data->customer->name]);
        $data['shipping_order'] = ShippingOrder::all();
        $data['category'] = Category::all();
        $data['product'] = Product::all();
        return view('components.registerSale.controlSales', $data);
    }

    public function createSale(SaleUpdateRequest $request): Redirector|Application|RedirectResponse
    {
        $sale = new Sale([
            'id_shipping_order'=>0,
            'id_customer'=>0,
            'id_payment_method'=>0,
            'saleDate'=>date('d-m-Y'),
            'totalCost'=>0,
            'shipping_status'=>true
        ]);

        $sale->save();

        return redirect('/sales/management')->with('message', 'successfulSaleCreation');
    }
}
