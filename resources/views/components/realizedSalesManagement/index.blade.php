@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Consolidado de ventas</h1>

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <p>
            <table>
                <tr>
                    <td width="100"><b>FECHA</b></td>
                    <td width="100">
                        <input class="form-control" type="date" max="<?php echo date("Y-m-d"); ?>"
                               value="" name="" id="datePicker" onchange="getDate();" required>
                    </td>
                </tr>
            </table>
            </p>


            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #d78aea; color: black">

                <tr style="border-color: black">
                    <th>N° Pedido</th>
                    <th>Fecha del Pedido</th>
                    <th>Documento cliente</th>
                    <th>Nombre cliente</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Departamento</th>
                    <th>Método de pago</th>
                    <th>Total</th>
                </tr>

                </thead>

                <tbody class="text-center" style="background-color: #F9F9F9" id="table">


                </tbody>

            </table>

        </div>
    </div>


@endsection
@section('js2')
    <script>
        var getDate = function () {
            var date = document.getElementById('datePicker').value || ""
            var table = document.getElementById('table')
            msg = '';
            @foreach ($shipping_order as $shipping)
            (date === '{{$shipping->saleDate}}') ? (msg += '<tr> <td>{{$shipping->id}}</td> <td>{{$shipping->saleDate}}</td> <td>{{\App\Models\Customer::all()->find($shipping->id_customer)->documentNumber}}</td> <td>{{\App\Models\Customer::all()->find($shipping->id_customer)->name}}</td> <td>{{\App\Models\ShippingOrder::all()->find($shipping->id_shipping_order)->address}}</td> <td>{{\App\Models\ShippingOrder::all()->find($shipping->id_shipping_order)->city}}</td> <td>{{\App\Models\ShippingOrder::all()->find($shipping->id_shipping_order)->department}}</td> <td>{{\App\Models\PaymentMethod::all()->find($shipping->id_payment_method)->nameMethod}}</td> <td>{{$shipping->totalCost}}</td> </tr>' ): '';
            @endforeach
                table.innerHTML=msg;
        }

    </script>

@endsection
