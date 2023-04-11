@extends('welcome')
@section('informationCust')
    <br>
        <div class="container" style="display: flex; justify-content: left">
            <div class="col-6" >
                <div class="card" style="background-color: #aef0ff">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <span class="text-black fw-bolder " style="font-size: 25px" ;>Información de contacto</span>
                    </div>
                    <form style="background-color: white" >
                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="name">Nombre</label>
                            <input type="text" class="form-control" name="name"
                                   onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
                                   value="{{isset($customer->name)?$customer->name:old('name')}}" required>
                        </div>

                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="lastname">Apellidos</label>
                            <input type="text" class="form-control" name="lastname"
                                   onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
                                   value="{{isset($customer->lastName)?$customer->lastName:old('lastName')}}" required>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="documentType">Tipo de documento</label>
                            <select class="form-select form-control" id="documentType" name="documentType" required="required">
                                <option value="Cedula de ciudadania"{{'documentType' == "Cedula de ciudadania"? 'selected': ''}}>Cédula de
                                    ciudadania
                                </option>
                                <option value="Cedula de extranjeria"{{'documentType' == "Cedula de extranjeria"? 'selected': ''}}>Cédula de
                                    extranjería
                                </option>
                                <option value="NIT"{{'documentType' == "NIT"? 'selected': ''}}>NIT</option>
                            </select>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="documentNumber">Nro. Documento</label>
                            <input type="number" class="form-control" name="documentNumber"
                                   value="{{isset($customer->documentNumber)?$customer->documentNumber:old('documentNumber')}}" required>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="phoneNumber">Nro. Celular</label>
                            <input type="number" class="form-control" name="phoneNumber"
                                   value="{{isset($customer->phoneNumber)?$customer->phoneNumber:old('phoneNumber')}}" required>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address"
                                   value="{{isset($customer->address)?$customer->address:old('address')}}" required>
                        </div>

                        <div class="form-group mt-2" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email"
                                   value="{{isset($customer->email)?$customer->email:old('email')}}" required>
                        </div><br>

                        <div class="col-12" style="text-align: center">
                            <a class="btn btn-primary" href="/order" id="button2">Atrás</a>
                            <a class="btn btn-primary" href="/saleAddress" id="button">Siguiente</a>
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

    <br>
@endsection
