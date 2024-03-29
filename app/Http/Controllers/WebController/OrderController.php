<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\DeliveryRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Sale;
use App\Models\ShippingOrder;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    function getPaymentMethod(){
        return view('components.sale.paymentMethod');
    }

    function getErrorPayment(){
        return redirect()->route('order')->with('message', 'errorPayment');
    }

    function getPendingPayment(){
        return redirect()->route('order')->with('message', 'pendingPayment');
    }

    function getSuccessfulPayment():RedirectResponse
    {

        $customer = new Customer();
        $customer->setAttribute('name', session('name'));
        $customer->setAttribute('lastName', session('lastName'));
        $customer->setAttribute('documentType', session('documentType'));
        $customer->setAttribute('documentNumber', session('documentNumber'));
        $customer->setAttribute('phoneNumber', session('phoneNumber'));
        $customer->setAttribute('address', session('address'));
        $customer->setAttribute('email', session('email'));
        $customer->save();

        $idCustomer = $customer->getAttribute('id');

        $shippingOrder = new ShippingOrder();
        $shippingOrder->setAttribute('address', session('shippingAddress'));
        $shippingOrder->setAttribute('department', session('department'));
        $shippingOrder->setAttribute('city', session('city'));
        $shippingOrder->save();

        $idShipping = $shippingOrder->getAttribute('id');

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setAttribute('nameMethod', session('paymentMethod'));
        $paymentMethod->setAttribute('additionalCost', 5000);
        $paymentMethod->save();

        $idPayment = $paymentMethod->getAttribute('id');

        $sale = new Sale();
        $sale->setAttribute('id_shipping_order', $idShipping);
        $sale->setAttribute('id_customer', $idCustomer);
        $sale->setAttribute('id_payment_method', $idPayment);
        $sale->setAttribute('saleDate', Carbon::now());
        $sale->setAttribute('totalCost', $this->getTotal());
        $sale->setAttribute('shipping_status', false);
        $sale->setAttribute('saleStatus', true);
        $sale->save();
        $idSale = $sale->getAttribute('id');


        $products = $this->getListProducts();

        foreach ($products as $product) {
            $orderDetail = new OrderDetail([
                'sale_id' => $idSale,
                'product_id' => $product->getAttribute('id'),
                'amount' => $product->getAttribute('stockAmount')
            ]);
            $orderDetail->save();
            $updatedProduct = Product::all()->find($product->getAttribute('id'));
            $updatedProduct->stockAmount = ($updatedProduct->stockAmount - $orderDetail->getAttribute('amount'));
            $updatedProduct->save();
        }
        session(['nameBill' => session('name')]);
        session(['addressBill' => session('shippingAddress')]);
        session(['phoneNumberBill' => session('phoneNumber')]);
        session(['productsBill' => $this->getListProducts()]);
        session(['totalBill' => $this->getTotal()]);
        session(['download.in.the.next.request' => 'downloadBill']);

        $this->emptyProductList();
        return redirect()->route('order')->with('message', 'successfulDelivery');
    }

    public function getMakeOrder(Category $category): Factory|View|Application
    {
        $products = $category->product()->get();
        return view("components.welcome.start", ['products' => $products, 'total' => $this->getTotal()]);
    }

    public function addProduct(Product $product): RedirectResponse
    {
        $category = $product->getAttribute('category_id');
        $result = $this->validateStock($product);

        if (!$result) {
            return redirect()->route('makeOrder', $category)->with('errorMessage', 'stockError');
        }
        return $this->addToTheList($product);
    }

    private function getTotal()
    {
        $total = 0;

        foreach ($this->getListProducts() as $item) {
            $total = $total + ($item->stockAmount * $item->price);
        }

        return $total;
    }

    private function validateStock(Product $product): bool
    {
        return ($product->getAttribute('stockAmount') - 1) >= 0;
    }

    private function addToTheList(Product $product): RedirectResponse
    {
        $category = $product->getAttribute('category_id');
        $listOfProducts = $this->getListProducts();

        foreach ($listOfProducts as $item) {
            if ($item->id == $product->getAttribute('id')) {

                if (($item->stockAmount + 1) > $product->getAttribute('stockAmount')) {
                    return redirect()->route('makeOrder', $category)->with('errorMessage', 'stockError');
                }

                $item->stockAmount = ($item->stockAmount + 1);

                return redirect()->route('makeOrder', $category)->with('message', 'successfulAddedOrder');
            }
        }

        $item = $product;
        $item->setAttribute('stockAmount', 1);

        array_push($listOfProducts, $product);
        $this->saveProducts($listOfProducts);

        return redirect()->route('makeOrder', $category)->with('message', 'successfulAddedOrder');
    }

    private function getListProducts()
    {
        $listOfProducts = session('listOfProducts');
        if (!$listOfProducts) {
            $listOfProducts = [];
        }
        return $listOfProducts;
    }

    private function saveProducts($listOfProducts)
    {
        session(['listOfProducts' => $listOfProducts]);
    }

    public function removeProduct(Request $request): RedirectResponse
    {
        $index = $request->get('indice');
        $listOfProducts = $this->getListProducts();

        if ($listOfProducts[$index]['stockAmount'] > 1) {
            $listOfProducts[$index]['stockAmount'] = ($listOfProducts[$index]['stockAmount'] - 1);
            return redirect()->route('makeOrder', 1);
        }

        array_splice($listOfProducts, $index, 1);
        $this->saveProducts($listOfProducts);
        return redirect()->route('makeOrder', 1);
    }

    public function finalizeOrder(DeliveryRequest $request): RedirectResponse
    {

        $customer = new Customer();
        $customer->setAttribute('name', $request->get('name'));
        $customer->setAttribute('lastName', $request->get('lastName'));
        $customer->setAttribute('documentType', $request->get('documentType'));
        $customer->setAttribute('documentNumber', $request->get('documentNumber'));
        $customer->setAttribute('phoneNumber', $request->get('phoneNumber'));
        $customer->setAttribute('address', $request->get('address'));
        $customer->setAttribute('email', $request->get('email'));
        $customer->save();

        $idCustomer = $customer->getAttribute('id');

        $shippingOrder = new ShippingOrder();
        $shippingOrder->setAttribute('address', $request->get('shippingAddress'));
        $shippingOrder->setAttribute('department', $request->get('department'));
        $shippingOrder->setAttribute('city', $request->get('city'));
        $shippingOrder->save();

        $idShipping = $shippingOrder->getAttribute('id');

        $paymentMethod = new PaymentMethod();
        $paymentMethod->setAttribute('nameMethod', $request->get('paymentMethod'));
        $paymentMethod->setAttribute('additionalCost', 5000);
        $paymentMethod->save();

        $idPayment = $paymentMethod->getAttribute('id');

        $sale = new Sale();
        $sale->setAttribute('id_shipping_order', $idShipping);
        $sale->setAttribute('id_customer', $idCustomer);
        $sale->setAttribute('id_payment_method', $idPayment);
        $sale->setAttribute('saleDate', Carbon::now());
        $sale->setAttribute('totalCost', $this->getTotal());
        if ($paymentMethod->getAttribute('nameMethod') == 'pago-contra-entrega' or $paymentMethod->getAttribute('nameMethod') == 'pago-fisico'){
            $sale->setAttribute('shipping_status', false);
            $sale->setAttribute('saleStatus', false);
        }else{
            $sale->setAttribute('shipping_status', false);
            $sale->setAttribute('saleStatus', true);
        }
        $sale->save();
        $idSale = $sale->getAttribute('id');


        $products = $this->getListProducts();

        foreach ($products as $product) {
            $orderDetail = new OrderDetail([
                'sale_id' => $idSale,
                'product_id' => $product->getAttribute('id'),
                'amount' => $product->getAttribute('stockAmount')
            ]);
            $orderDetail->save();
            $updatedProduct = Product::all()->find($product->getAttribute('id'));
            $updatedProduct->stockAmount = ($updatedProduct->stockAmount - $orderDetail->getAttribute('amount'));
            $updatedProduct->save();
        }
        session(['nameBill' => $request->get('name')]);
        session(['addressBill' => $request->get('shippingAddress')]);
        session(['phoneNumberBill' => $request->get('phoneNumber')]);
        session(['productsBill' => $this->getListProducts()]);
        session(['totalBill' => $this->getTotal()]);
        session(['download.in.the.next.request' => 'downloadBill']);

        $this->emptyProductList();

        return redirect()->route('order')->with('message', 'successfulDelivery');
    }

    public function storeSession(Request $request){
        session(['documentType' => $request->get('documentType')]);
        session(['phoneNumber' => $request->get('phoneNumber')]);
        session(['department' => $request->get('department')]);
        session(['city' => $request->get('city')]);
        session(['email' => $request->get('email')]);
        session(['name' => $request->get('name')]);
        session(['lastName' => $request->get('lastName')]);
        session(['documentNumber' => $request->get('documentNumber')]);
        session(['address' => $request->get('address')]);
        session(['shippingAddress' => $request->get('shippingAddress')]);
        session(['paymentMethod' => $request->get('paymentMethod')]);
    }

    private function emptyProductList()
    {
        $this->saveProducts(null);
    }

    public function downloadBill(): Response
    {
        session(['download.in.the.next.request' => false]);

        $pdf = Pdf::loadView('components.download.bill');
        $pdf->setPaper('A3');

        return $pdf->download('Solicitud_Domicilio' . '.pdf');
    }

}
