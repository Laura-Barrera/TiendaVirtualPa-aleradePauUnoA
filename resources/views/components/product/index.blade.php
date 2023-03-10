@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Productos</h1>

        <a href="{{url('product/create')}}" class="btn btn-success">Registrar nuevo producto</a>

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #202022; color: white">

                <tr style="border-color: black">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Referencia</th>
                    <th>Iva</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>

                </thead>

                <tbody class="text-center align-middle">

                @foreach ($products as $product)

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stockAmount}}</td>
                        <td>{{$product->referenceNumber}}</td>
                        <td>{{$product->iva}}</td>

                        <td>
                            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$product->image}}"
                                 width="100" alt="image_product">
                        </td>

                        <td>{{$product->category->name}}</td>

                        <td>

                            <a href="{{url('product/edit/'.$product->id)}}" class="btn btn-primary">Editar</a>

                            <form action="{{url('/product/destroy/'.$product->id)}}" class="d-inline confirmation_alert"
                                  method='post'>
                                @csrf
                                {{method_field('DELETE')}}
                                <input type='submit' value="Borrar" class="btn btn-danger">
                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection

@section('indexProductScript')
    <script>

        @if(session('message') == 'successfulProductCreation')
        Swal.fire({
            title: 'Producto agregado correctamente',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

        @if(session('message') == 'successfulProductUpdate')
        Swal.fire({
            title: 'Producto actualizado correctamente',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

        @if(session('message') == 'successfulProductDeletion')
        Swal.fire({
            title: 'Producto eliminado correctamente',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

        // Confirmation alert

        $('.confirmation_alert').submit(function (e) {

            e.preventDefault()

            Swal.fire({
                title: '¿Desea borrar el producto?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, borrar',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        })

    </script>
@endsection
