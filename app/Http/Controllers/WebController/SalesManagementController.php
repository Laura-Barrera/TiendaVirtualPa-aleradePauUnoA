<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\SaleUpdateRequest;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\ShippingOrder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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
        $data['shipping_order'] = Sale::all()->where('saleStatus', '=', false);
        return view('components.saleManagement.index', $data);
    }
    public function details(Sale $shipping)
    {
        $data['details'] = OrderDetail::all()->where('sale_id', '=', $shipping->getAttribute('id'));
        return view('components.details.index', $data);
    }
    public function changeStatus(Sale $shipping): Redirector|Application|RedirectResponse
    {
        Sale::all()->find($shipping->getAttribute('id'))->setAttribute('shipping_status', 1);
        $shipping->save();
        return redirect('shippingOrder/management')->with('message', 'successfulSaleUpdate');
    }

    public function destroy(Sale $shipping): Redirector|Application|RedirectResponse
    {
        $allShippings = ShippingOrder::all()->where('id', '=', $shipping->getAttribute('id'));
        foreach ($allShippings as $shop)
            if ($shop->getAttribute('id') != 1){
                $shop->delete();
            }
        $shipping->delete();
        return redirect('shippingOrder/management')->with('message', 'successfulSaleDelete');
    }

    public function indexRealizedSales(): \Illuminate\Contracts\View\Factory|View|Application
    {
        #return view('components.saleManagement.index', $data)->with(['CustomerDocument' => $data->customer->documentNumber], ['CustomerName'=> $data->customer->name]);
        $data['shipping_order'] = Sale::all()->where('saleStatus', '=', true);
        return view('components.realizedSalesManagement.index', $data);
    }

}
