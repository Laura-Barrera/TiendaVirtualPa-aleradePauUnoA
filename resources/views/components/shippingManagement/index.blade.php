@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Pedidos</h1>

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #202022; color: white">

                <tr style="border-color: black">
                    <th>N° Pedido</th>
                    <th>Documento cliente</th>
                    <th>Nombre cliente</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Departamento</th>
                    <th>Estado del pago</th>
                    <th>Estado del pedido</th>
                    <th>Detalle</th>
                    <th>ACCIONES</th>
                </tr>

                </thead>

                <tbody class="text-center">

                @foreach ($shipping_order as $shipping)
                    <tr>
                        <td>{{$shipping->id}}</td>
                        <td>{{$shipping->customer->documentNumber}}</td>
                        <td>{{$shipping->customer->name}}</td>
                        <td>{{$shipping->address}}</td>
                        <td>{{$shipping->city}}</td>
                        <td>{{$shipping->department}}</td>
                        <td>{{$shipping->paymentStatus}}</td>
                        <td>{{$shipping->shippingStatus}}</td>
                        <td><a href="{{url('/shippingOrder/management/'.$shipping->id)}}" class="btn btn-primary">Visualizar
                                Detalle</a></td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>

@endsection

@section('domicilesScript')
    <script>

        @if(session('message') == 'informationSavedSuccessfully')
        Swal.fire({
            title: 'Información guardada',
            text: 'Por favor verifica tu correo electronico.',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

    </script>
@endsection
