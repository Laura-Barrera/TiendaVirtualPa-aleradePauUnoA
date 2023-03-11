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
        $data['shipping_order'] = ShippingOrder::all()->where('saleStatus', '=', true);
        return view('components.saleManagement.index', $data);
    }
    public function details(Sale $sale): Factory|View|Application
    {
        $data['details'] = OrderDetail::all()->where('sale_id', '=', $sale->getAttribute('id'));
        return view('components.details.index', $data);
    }
    public function changeStatus(Sale $sale, SaleUpdateRequest $request): Redirector|Application|RedirectResponse
    {
        $sale->update($request->all());
        $sale->save();
        return redirect('shippingOrder/management')->with('message', 'successfulSaleUpdate');
    }

    public function destroy(Sale $sale): Redirector|Application|RedirectResponse
    {
        $orders = ShippingOrder::all()->where('sale_id', '=', $sale->getAttribute('id'));
        foreach ($orders as $order)
            $order->delete();
        $sale->delete();
        return redirect('employee/management')->with('message', 'successfulSaleDelete');
    }

    public function indexRealizedSales(): \Illuminate\Contracts\View\Factory|View|Application
    {
        #return view('components.saleManagement.index', $data)->with(['CustomerDocument' => $data->customer->documentNumber], ['CustomerName'=> $data->customer->name]);
        $data['shipping_order'] = ShippingOrder::all();
        return view('components.realizedSalesManagement.index', $data);
    }

}
