@extends('layouts.app')

@section('content')
    <div class="container border">

        <div class="col-11 col-md-6 mx-auto">

            <form action="{{url('product/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('components.product.form', ['mod'=>'Crear'] )
            </form>

        </div>

    </div>
@endsection
