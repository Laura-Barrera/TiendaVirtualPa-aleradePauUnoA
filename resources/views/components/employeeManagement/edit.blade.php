@extends('layouts.app')

@section('content')
    <div class="container border">

        <div class="col-11 col-md-6 mx-auto">

            <form action="{{url('/employee/update/'.$employee->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}

                @include('components.employeeManagement.form', ['mod'=>'Editar'])

                <div class="mt-4 mb-5">
                    <input type="submit" class="btn btn-success" value="Editar empleado">
                    <a class="btn btn-primary" href="{{url('employee/management')}}">Regresar</a>
                </div>

            </form>

        </div>

    </div>
@endsection
