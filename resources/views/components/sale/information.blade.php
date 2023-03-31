@extends('layouts.auth')
@section('content')
    <br>
    <div class="container">
        <div class="container" style="display: flex; justify-content: left">
            <div class="col-6">
                <div class="card" style="background-color: #aef0ff">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <span class="text-black fw-bolder " style="font-size: 25px" ;>Información de contacto</span>
                    </div>
                    <form style="background-color: white">
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
                            <a href="/order" class="btn btn-danger" id="button2">Atrás</a>
                            <a href="/saleAddress" class="btn btn-danger" id="button">Siguiente</a>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" style="display: flex; justify-content: right">

        </div>

        <br>
@endsection
