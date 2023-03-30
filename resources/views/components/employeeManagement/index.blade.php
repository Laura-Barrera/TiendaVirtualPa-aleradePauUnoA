@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Empleados</h1>

        <a href="{{url('employee/create')}}" class="btn btn-success" id="button">Registrar nuevo empleado</a>

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #d78aea; color: black">

                <tr style="border-color: black">
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tipo Documento</th>
                    <th>Nro. Documento</th>
                    <th>Nro. Celular</th>
                    <th>Dirección</th>
                    <th>Fecha Contratación</th>
                    <th>Salario</th>
                    <th>ID Usuario</th>
                    <th>Acciones</th>
                </tr>

                </thead>

                <tbody class="text-center" style="background-color: #F9F9F9">

                @foreach ($employees as $employee)

                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->lastName}}</td>
                        <td>{{$employee->documentType}}</td>
                        <td>{{$employee->documentNumber}}</td>
                        <td>{{$employee->phoneNumber}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->hiringDate}}</td>
                        <td>{{$employee->salary}}</td>
                        <td>{{$employee->user_id}}</td>
                        <td>

                            <a href="{{url('employee/edit/'.$employee->id)}}" class="btn btn-primary" id="button">Editar</a>
                            <form action="{{url('/employee/destroy/'.$employee->id)}}"
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

@section('indexEmployeeScript')
    <script>

        @if(session('message') == 'successfulEmployeeCreation')
        Swal.fire({
            title: 'Empleado agregado correctamente',
            icon: 'success',
            confirmButtonColor: '#a1bcff',
        })
        @endif

        @if(session('message') == 'successfulEmployeeUpdate')
        Swal.fire({
            title: 'Empleado actualizado correctamente',
            icon: 'success',
            confirmButtonColor: '#a1bcff',
        })
        @endif

        @if(session('message') == 'successfulEmployeeDeletion')
        Swal.fire({
            title: 'Empleado eliminado correctamente',
            icon: 'success',
            confirmButtonColor: '#a1bcff',
        })
        @endif

        // Confirmation alert

        $('.confirmation_alert').submit(function (e) {

            e.preventDefault()

            Swal.fire({
                title: '¿Desea borrar el empleado indicado?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#a1bcff',
                confirmButtonText: 'Si, borrar',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d78aea',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        })

    </script>
@endsection

