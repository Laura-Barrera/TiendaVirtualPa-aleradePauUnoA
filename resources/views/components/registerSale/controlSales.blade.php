@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="text-center">
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                   aria-expanded="false" aria-controls="collapseExample" onclick="getCategory()">
                    Registrar venta ahora
                </a>

            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="d-grid gap-2">
                        <form action="{{route('sales/create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-3" id="divselect1">
                            <select id="select" class="form-select" aria-label="Default select example" name="category"
                                    onchange="getCategory()">

                                @foreach ($category as $cat)

                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach

                            </select>
                            </div>

                            <div class="form-group mt-3" id="divselect2">
                            <select id="productos" class="form-select" aria-label="Default select example" name="producto">

                            </select>
                            </div>

                            <div class="form-group mt-3" id="divnumber">
                            <input class="cantidad" type="number" name="cantidad" value="1">
                            </div>

                            <input type="submit" value="Registrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Consolidado de ventas</h1>


        <div class="mt-3 mb-3" style="overflow-x:auto;">


            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #202022; color: white">

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

                <tbody class="text-center">

                @foreach ($shipping_order as $shipping)
                    <tr>
                        <td>{{$shipping->id}}</td>
                        <td>{{$shipping->saleDate}}</td>
                        <td>{{$shipping->customer->documentNumber}}</td>
                        <td>{{$shipping->customer->name}}</td>
                        <td>{{$shipping->shippingOrder->address}}</td>
                        <td>{{$shipping->shippingOrder->city}}</td>
                        <td>{{$shipping->shippingOrder->department}}</td>
                        <td>{{$shipping->paymentMethod->nameMethod}}</td>
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
        }

    </script>
@endsection

