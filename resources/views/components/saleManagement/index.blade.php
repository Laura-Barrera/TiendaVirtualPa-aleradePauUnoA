@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Pedidos</h1>

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
                    <th>Total</th>
                    <th>Estado del pedido</th>
                    <th>Detalle de Compra</th>
                    <th>Acciones</th>
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
                        <td>{{$shipping->totalCost}}</td>
                        <td>{{$shipping->saleStatus}}</td>
                        <td><a href="{{url('/shippingOrder/management/'.$shipping->id)}}" class="btn btn-primary">Visualizar
                                Detalle</a>
                        </td>
                        <td><a href="{{url('/shippingOrder/management/changeStatus/'.$shipping->id)}}" class="btn btn-primary">Cambiar Estado</a>

                            <form action="{{url('/shippingOrder/management/destroy/'.$shipping->id)}}"
                                  class="d-inline confirmation_alert" method='post'>
                                @csrf
                                {{method_field('DELETE')}}
                                <input type='submit' value="Borrar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>

@endsection

@section('indexSaleScript')
    <script>
        @if(session('message') == 'successfulSaleUpdate')
        Swal.fire({
            title: 'Estado del pedido actualizado correctamente',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

        @if(session('message') == 'successfulSaleDelete')
        Swal.fire({
            title: 'Pedido cancelado correctamente',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

        $('.confirmation_alert').submit(function (e) {

            e.preventDefault()

            Swal.fire({
                title: '¿Desea cancelar el pedido indicado?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, cancelar pedido',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        })
    </script>
@endsection
