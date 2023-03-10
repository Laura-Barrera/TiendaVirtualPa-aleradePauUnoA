@extends('layouts.app')

@section('content')
    <div class="container border">

        <div class="col-11 col-md-6 mx-auto">

            <form action="{{url('/product/update/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('components.product.form', ['mod'=>'Editar'] )
            </form>
        </div>

    </div>
@endsection
