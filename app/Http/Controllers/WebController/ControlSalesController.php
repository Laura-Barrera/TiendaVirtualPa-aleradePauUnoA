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
        $data['shipping_order'] = Sale::all();
        $data['category'] = Category::all();
        $data['product'] = Product::all();
        return view('components.registerSale.controlSales', $data);
    }

    public function createSale(SaleUpdateRequest $request): Redirector|Application|RedirectResponse
    {
        $cantidad=$request->get('cantidad');
        $producto=$request->get('producto');
        if ($cantidad>Product::all()->find($producto)->stockAmount){
            return redirect('/sales/register')->with('message', 'AmountNotValid');
        }else{

            $totalCost=(int)(Product::all()->find($producto)->price*Product::all()->find($producto)->iva) * $cantidad;
            $sale = new Sale([
                'id_shipping_order'=>1,
                'id_customer'=>1,
                'id_payment_method'=>1,
                'saleDate'=>date('Y-m-d'),
                'totalCost'=>$totalCost,
                'shipping_status' => true,
                'saleStatus'=>true
            ]);



            $sale->save();
            $idsale= $sale->getAttribute('id');
            $producto= Product::all()->find($producto);
            $producto->stockAmount=(Product::all()->find($producto)->stockAmount)-$cantidad;
            $idProduct = $producto->getAttribute('id');
            $producto->save();
            $orderDetail = new OrderDetail([
                'sale_id'=>$idsale,
                'product_id'=>$idProduct,
                'amount'=>$cantidad]);
            $orderDetail->save();


            return redirect('/sales/register')->with('message', 'successfulPSalesCreated');
        }

    }
}
