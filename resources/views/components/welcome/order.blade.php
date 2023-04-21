@extends('welcome')
@section('order')
    <br>
    <div class="container" >
        <div class="container" style="display: flex; justify-content: center">
            <div class="col-12 col-lg-5 text-center">
                @if(session('listOfProducts') == null)
                    <img class="img-fluid" src="{{asset('img/orderBackground/bannerOrder.png')}}" width="300"
                         alt="..."/>
                @else
                    @php
                        $total = 0; // Declarar la variable $total e inicializarla en 0
                    @endphp
                    <div class="card" style="background-color: #aef0ff">

                        <div class="card-header d-flex align-items-center justify-content-center">
                            <span class="text-black fw-bolder " style="font-size: 25px";>Tu pedido</span>
                        </div>

                        <ul class="list-group list-group-flush" style="overflow-y: auto; height: 13rem;">

                            <li class="list-group-item" style="background-color: #d78aea; margin-top: 1px">

                                <div class="row">

                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">Cantidad</span>
                                    </div>

                                    <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">Producto</span>
                                    </div>

                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-black fs-6">Precio</span>
                                    </div>

                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-black fs-6">Acción</span>
                                    </div>

                                </div>

                            </li>

                            <li class="list-group-item" style="border-color: #5febc5; margin-top: 1px">

                                @foreach(session('listOfProducts') as $selectedProduct)

                                    <div class="row mb-2">

                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">{{$selectedProduct->stockAmount}}</span>
                                        </div>

                                        <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">{{$selectedProduct->name}}</span>
                                        </div>

                                        <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-black fs-6">$&nbsp;{{number_format(($selectedProduct->stockAmount * $selectedProduct->price), 0, ',', '.')}}</span>
                                        </div>

                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <form action="{{url('/removeProduct')}}" method="post">
                                                @method("delete")
                                                @csrf
                                                <input type="hidden" name="indice" value="{{$loop->index}}">
                                                <button type="submit" class="btn btn-danger"
                                                        style="background-color: rgba(255,0,0,0.5); color: white">
                                                    <i class="fa-solid fa-trash"> </i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                    @php
                                        $total += $selectedProduct->stockAmount * $selectedProduct->price;
                                    @endphp
                                @endforeach
                            </li>
                        </ul>
                        <div class="card-footer d-flex">
                            <span class="text-black fs-4 fw-bolder">
                                Total:${{number_format( $total, 0, ',', '.')}}
                            </span>
                        </div>
                    </div><br>
                    <a href="{{ route('paymentMethod') }}" class="btn btn-danger" id="button">Pagar Ahora</a>
                @endif

            </div>
        </div>


    </div>

    <br>
@endsection
@section('orderScripts')
    <script>
        @if(session('message') == 'successfulDelivery')
            Swal.fire({
                title: 'Solicitud de domicilio realizada correctamente',
                text: 'Cualquier inquietud no dudes en contactarnos.',
                icon: 'success',
                confirmButtonColor: '#5febc5',
            })
        @endif

        @if(session('message') == 'errorPayment')
        Swal.fire({
            title: 'Error!!',
            text: 'No se pudo realizar la compra.',
            icon: 'error',
            confirmButtonColor: '#a1bcff',
        })
        @endif

        @if(session('message') == 'pendingPayment')
        Swal.fire({
            title: 'Pendiente',
            text: 'Su pago queda pendiente.',
            icon: 'warning',
            confirmButtonColor: '#da8f59',
        })
        @endif
    </script>

@endsection
