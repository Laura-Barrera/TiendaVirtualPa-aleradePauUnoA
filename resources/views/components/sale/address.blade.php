@extends('layouts.auth')
@section('content')
    <br>
    <div class="container">
        <div class="container" style="display: flex; justify-content: left">
            <div class="col-6">
                <div class="card" style="background-color: #aef0ff">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <span class="text-black fw-bolder " style="font-size: 25px" ;>Información de envio</span>
                    </div>
                    <form style="background-color: white">
                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="addressShipping">Dirección envío</label>
                            <input type="text" class="form-control" name="addressShipping"
                                   value="{{isset($shipingOrder->address)?$shipingOrder->address:old('addressShiping')}}" required>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="city">Ciudad</label>
                            <input type=text" class="form-control" name="city"
                                   value="{{isset($shipingOrder->city)?$shipingOrder->city:old('city')}}" required>
                        </div>

                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="department">Departamento</label>
                            <input type="text" class="form-control" name="department"
                                   onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
                                   value="{{isset($shipingOrder->department)?$shipingOrder->department:old('deparment')}}" required>
                        </div><br>

                        <div class="col-12" style="text-align: center">
                            <a href="{{ route('informationCustomer') }}" class="btn btn-danger" id="button2">Atrás</a>
                            <a href="/salePayment" class="btn btn-danger" id="button">Siguiente</a>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" style="display: flex; justify-content: right">

        </div>

        <br>
@endsection
