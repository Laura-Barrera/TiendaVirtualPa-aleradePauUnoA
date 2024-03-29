@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Detalles del pedido</h1>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #d78aea; color: black">

                <tr style="border-color: black">
                    <th>ID Pedido</th>
                    <th>ID Detalle</th>
                    <th>Nombre Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                </tr>

                </thead>

                <tbody class="text-center" style="background-color: #F9F9F9">
                @foreach ($details as $detail)
                    <tr>
                        <td>{{$detail->sale_id}}</td>
                        <td>{{$detail->id}}</td>
                        <td>{{\App\Models\Product::all()->find($detail->product_id)->getAttribute('name')}}</td>
                        <td>${{number_format(\App\Models\Product::all()->find($detail->product_id)->getAttribute('price'),0,',','.')}}</td>

                        <td>{{$detail->amount}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

        <a class="btn btn-primary" href="{{url('shippingOrder/management')}}" style="float: right;" id="button">Regresar</a>

    </div>
@endsection
