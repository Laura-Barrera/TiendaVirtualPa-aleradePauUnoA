<br>
<div class="container" >
    <div class="container" style="display: flex; justify-content: center">
        <div class="col-12 col-lg-5 text-center">
            @if(session('listOfProducts') == null)
                <img class="img-fluid" src="{{asset('img/orderBackground/bannerOrder.png')}}" width="300"
                     alt="..."/>
            @else

                <div class="card" style="background-color: #a1bcff">

                    <div class="card-header d-flex align-items-center justify-content-center">
                        <span class="text-white fw-bolder " style="font-size: 25px;">Tu pedido</span>
                    </div>

                    <ul class="list-group list-group-flush" style="overflow-y: auto; height: 13rem;">

                        <li class="list-group-item" style="background-color: #5febc5; margin-top: 1px">

                            <div class="row">

                                <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">Cantidad</span>
                                </div>

                                <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">Producto</span>
                                </div>

                                <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-white fs-6">Precio</span>
                                </div>

                                <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-white fs-6">Acción</span>
                                </div>

                            </div>

                        </li>

                        <li class="list-group-item" style="background-color: rgba(0,0,0,0.75); margin-top: 1px">

                            @foreach(session('listOfProducts') as $selectedProduct)

                                <div class="row mb-2">

                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">{{$selectedProduct->stockAmount}}</span>
                                    </div>

                                    <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">{{$selectedProduct->name}}</span>
                                    </div>

                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-white fs-6">$&nbsp;{{number_format(($selectedProduct->stockAmount * $selectedProduct->price), 0, ',', '.')}}</span>
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


                </div>

            @endif

        </div>
    </div>


</div>

<br>
