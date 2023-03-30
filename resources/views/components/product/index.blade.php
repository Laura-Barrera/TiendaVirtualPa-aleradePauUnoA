@extends('layouts.app')

@section('content')
    <div class="container">


        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Productos</h1>
        <div class="container">
            <a href="{{url('product/create')}}" class="btn btn-success" id="button">Registrar nuevo producto</a>
        </div>
        <br>
        <div class="container">
            <div class="table-responsive">
                <table id="tablaProductos" class="table table-striped table-bordered border-dark productsTable">
                    <thead class="text-center" style="background: #d78aea; color: black">
                    <tr>

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
                    <tbody class="text-center align-middle" style="background-color: #F9F9F9">
                    @foreach ($products as $product)

                        <tr>

                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>${{$product->price}}</td>
                            <td>{{$product->stockAmount}}</td>
                            <td>{{$product->referenceNumber}}</td>
                            <td>{{$product->iva}}</td>

                            <td>
                                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$product->image}}"
                                     width="100" alt="image_product">
                            </td>

                            <td>{{$product->category->name}}</td>

                            <td>

                                <a href="{{url('product/edit/'.$product->id)}}" class="btn btn-primary" id="button2">Editar</a>

                                <form action="{{url('/product/destroy/'.$product->id)}}"
                                      class="d-inline confirmation_alert"
                                      method='post'>
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type='submit' value="Borrar" class="btn btn-danger" id="button3">
                                </form>

                            </td>

                        </tr>

                    @endforeach


                    </tbody>

                    <tfoot class="text-center" style="background: #d78aea; color: black">
                    <tr>

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
                    </tfoot>
                </table>
            </div>
        </div>
        @endsection



        @section('indexProductScript')

            <script>
                $(document).ready(function () {
                    $('#tablaProductos').DataTable();
                });
            </script>
            <script>

                @if(session('message') == 'successfulProductCreation')
                Swal.fire({
                    title: 'Producto agregado correctamente',
                    icon: 'success',
                    confirmButtonColor: '#a1bcff',
                })
                @endif

                @if(session('message') == 'successfulProductUpdate')
                Swal.fire({
                    title: 'Producto actualizado correctamente',
                    icon: 'success',
                    confirmButtonColor: '#a1bcff',
                })
                @endif

                @if(session('message') == 'successfulProductDeletion')
                Swal.fire({
                    title: 'Producto eliminado correctamente',
                    icon: 'success',
                    confirmButtonColor: '#a1bcff',
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
