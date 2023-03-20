@extends('layouts.app')

@section('content')
    <div class="container border">

        <div class="col-11 col-md-6 mx-auto">

            <form action="{{url('employee/store')}}" method="post" enctype="multipart/form-data">
                @csrf

                @include('components.employeeManagement.form', ['mod'=>'Crear'] )

                <!-- Email -->
                <div class="form-group mt-3" id="divEmail">
                    <label for="emailInput" class="col-md-5 text-md-right">{{ __('Correo') }}</label>
                    <div class="col-md-6">
                        <input id="emailInput" type="email" class="custom-form form-control" name="email"
                               value="{{ old('email') }}" required autocomplete="email">
                        <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                        </span>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group mt-3" id="divPasswd">
                    <label for="passwordInput" class="col-md-5 text-md-right">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="passwordInput" type="password" class="custom-form form-control" name="password"
                               required autocomplete="new-password">
                        <span class="invalid-feedback" role="alert" id="passwordError">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="mt-4 mb-5">
                    <input type="submit" class="btn btn-success" value="Crear empleado" id="button">
                    <a class="btn btn-primary" href="{{url('employee/management')}}" id="button2">Regresar</a>
                </div>

            </form>

        </div>

    </div>
@endsection
