<h1 class="text-center mt-md-5" style="font-family: 'Arial Rounded MT Bold', sans-serif">
    {{$mod}} Empleado
</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="name">Nombres</label>
    <input type="text" class="form-control" name="name" value="{{isset($employee->name)?$employee->name:old('name')}}" onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
           required>
</div>

<div class="form-group mt-3">
    <label for="lastName">Apellidos</label>
    <input type="text" class="form-control" name="lastName" onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
           value="{{isset($employee->lastName)?$employee->lastName:old('lastName')}}" required>
</div>

<div class="form-group mt-3">
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

<div class="form-group mt-3">
    <label for="documentNumber">Nro. Documento</label>
    <input type="number" class="form-control" name="documentNumber"
           value="{{isset($employee->documentNumber)?$employee->documentNumber:old('documentNumber')}}" required>
</div>

<div class="form-group mt-3">
    <label for="phoneNumber">Nro. Celular</label>
    <input type="number" class="form-control" name="phoneNumber"
           value="{{isset($employee->phoneNumber)?$employee->phoneNumber:old('phoneNumber')}}" required>
</div>

<div class="form-group mt-3">
    <label for="address">Dirección</label>
    <input type="text" class="form-control" name="address"
           value="{{isset($employee->address)?$employee->address:old('address')}}" required>
</div>

<div class="form-group mt-3">
    <label for="hiringDate">Fecha Contratación</label>
    <input class="form-control" type="date" max="<?php echo date("Y-m-d"); ?>"
           value="{{isset($employee->hiringDate)?$employee->hiringDate:old('hiringDate')}}" name="hiringDate" required>
</div>

<div class="form-group mt-3">
    <label for="salary">Salario</label>
    <input type="number" class="form-control" name="salary"
           value="{{isset($employee->salary)?$employee->salary:old('salary')}}" required>
</div>
