@extends('welcome')
@section('addressShipping')
    <br>
    <div class="container">
        <div class="container" style="display: flex; justify-content: left">
            <div class="col-6">
                <div class="card" style="background-color: #aef0ff">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <span class="text-black fw-bolder " style="font-size: 25px" ;>Método de pago</span>
                    </div>
                    <form style="background-color: white">
                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <input type="radio" name="pse">
                            <label class="text-black" for="pse">PSE</label>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <input type="radio" name="tarjCredito">
                            <label class="text-black" for="tarjCredito">Tarjeta de Crédito</label>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <input type="radio" name="pagoCEnt" required>
                            <label class="text-black" for="pagoCEnt">Pago Contra Entrega</label>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <input type="radio" name="pagoPFisico">
                            <label class="text-black" for="pagoPFisico">Pago en punto físico</label>
                        </div><br>

                        <div class="col-12" style="text-align: center">
                            <a href="{{ route('informationAddress') }}" class="btn btn-danger" id="button2">Atrás</a>
                            <a href="/" class="btn btn-danger" id="button">Siguiente</a>
                        </div><br>
                    </form>
                </div>
            </div>
            <div class="col-6 ">
                <div class="container" style="display: flex; justify-content: center">
                    <div class="col-10">
                        @if(session('listOfProducts') == null)
                            <img class="img-fluid" src="{{asset('img/orderBackground/bannerOrder.png')}}" width="300"
                                 alt="..."/>
                        @else

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

                                        @endforeach
                                    </li>
                                </ul>
                            </div><br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('alertsScript')
    <script>
        // Confirmation alert
        $('.confirmation_alert').submit(function (e) {
            e.preventDefault()
            Swal.fire({
                title: '¿Desea finalizar la orden?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#a1bcff',
                confirmButtonText: 'Si, finalizar',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d78aea',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
        @if(session('errorMessage') == 'stockError')
        Swal.fire({
            title: 'No hay más unidades de este producto',
            icon: 'error',
            confirmButtonColor: '#a1bcff',
        })
        @endif
        @if(session('message') == 'successfulDelivery')
        Swal.fire({
            title: 'Solicitud de domicilio realizada correctamente',
            text: 'Cualquier inquietud no dudes en contactarnos.',
            icon: 'success',
            confirmButtonColor: '#5febc5',
        })
        @endif
    </script>

@endsection
