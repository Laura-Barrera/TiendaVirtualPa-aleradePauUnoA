@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Pedidos</h1>

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
                    <th>Total</th>
                    <th>Estado del pedido</th>
                    <th>Detalle de Compra</th>
                    <th>Acciones</th>
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
                        <td>{{$shipping->saleStatus}}</td>
                        <td><p><a href="{{url('/shippingOrder/management/'.$shipping->id)}}" class="btn btn-primary" id="button">Visualizar Detalle</a></p>
                            <p><a href="{{url('/shippingOrder/management/changeStatus/'.$shipping->id)}}" class="btn btn-primary" id="button2">Cambiar Estado</a></p>

                            <form action="{{url('/shippingOrder/management/destroy/'.$shipping->id)}}"
                                  class="d-inline confirmation_alert" method='post'>
                                @csrf
                                {{method_field('DELETE')}}
                                <input type='submit' value="Borrar" class="btn btn-danger" id="button3">
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
                confirmButtonColor: '#a1bcff',
                confirmButtonText: 'Si, cancelar pedido',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d78aea ',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
@endsection
