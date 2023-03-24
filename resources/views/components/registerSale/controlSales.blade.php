@extends('layouts.app')

@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">

        <div class="text-center">
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                   aria-expanded="false" aria-controls="collapseExample" onclick="getCategory()" id="button">
                    Registrar venta ahora
                </a>

            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="d-grid gap-2">
                        <form action="{{route('sales/create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row" id="divselect1">
                                <div class="col-3">
                                    <span class="input-group-addon"><b>{{ __('Categoria') }}</b></span>
                                </div>
                                <div class="col-9">
                                    <select id="select" class="form-select" aria-label="Default select example" name="category"
                                            onchange="getCategory()">

                                        @foreach ($category as $cat)

                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach

                                    </select>
                                    <input name="saleDate" value="15-03-2023" hidden>
                                    <input name="totalCost" value="5000" hidden>
                                    <input name="saleStatus" value="0" hidden>                                </div>
                            </div>
                            <p></p>
                            <div class="row" id="divselect2">
                                <div class="col-3">
                                    <span class="input-group-addon"><b>{{ __('Producto') }}</b></span>
                                </div>
                                <div class="col-9">
                                    <select id="productos" class="form-select" aria-label="Default select example" name="producto">
                                    </select>
                                </div>
                            </div>
                            <p></p>
                            <div class="row" id="divnumber">
                                <div class="col-3">
                                    <span class="input-group-addon"><b>{{ __('Cantidad') }}</b></span>
                                </div>
                                <div class="col-9">
                                    <input class="cantidad col-12" id="cantidad" type="number" name="cantidad" >
                                </div>
                            </div>
                            <p></p>
                            <input class="btn btn-primary" type="submit" value="Registrar" id="button2" >
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Consolidado de ventas</h1>


        <div class="mt-3 mb-3" style="overflow-x:auto;">


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

                <tbody class="text-center" style="background-color: #F9F9F9">

                @foreach ($shipping_order as $shipping)
                    <tr>
                        <td>{{$shipping->id}}</td>
                        <td>{{$shipping->saleDate}}</td>
                        <td>{{\App\Models\Customer::all()->find($shipping->id_customer)->documentNumber}}</td>
                        <td>{{\App\Models\Customer::all()->find($shipping->id_customer)->name}}</td>
                        <td>{{\App\Models\ShippingOrder::all()->find($shipping->id_shipping_order)->address}}</td>
                        <td>{{\App\Models\ShippingOrder::all()->find($shipping->id_shipping_order)->city}}</td>
                        <td>{{\App\Models\ShippingOrder::all()->find($shipping->id_shipping_order)->department}}</td>
                        <td>{{\App\Models\PaymentMethod::all()->find($shipping->id_payment_method)->nameMethod}}</td>
                        <td>{{$shipping->totalCost}}</td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>

@endsection
@section('js')
    <script>

        var getCategory = function () {
            var cate = document.getElementById('select').value || ""
            var prods = document.getElementById('productos');
            prods.innerHTML ="";
            msg="";
            @foreach ($product as $prod)
            (cate === '{{$prod->category_id}}') ? ( msg+= '<option value="{{$prod->id}}">{{$prod->name}}</option>') : "";
            @endforeach
                prods.innerHTML=msg
            return 0;
        }



    </script>
@endsection
