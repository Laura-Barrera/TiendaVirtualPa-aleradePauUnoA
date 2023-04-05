@extends('welcome')
@section('catalogue')
    <br><div class="container">
        <div class="table-responsive">
            <div class="card-body" style="background-color: white">
                @foreach($categories as $category)
                    <h2 style="text-align: center;color:#d78aea"><b>{{ $category->name }}</b></h2>
                    <table>
                        <tr>
                            @foreach($products->where('category_id', $category->id)->take(3) as $product)
                                <td>
                                    <div class="card custom-card" style="width: 18rem; margin: 0.7rem;">

                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             class="card-img-top custom-levitation-effect" alt="Product">

                                        <div class="card-body custom-card-body">

                                            <h5 class="card-title">{{$product->name}}</h5>
                                            <h6 class="card-title">
                                                $ {{number_format($product->price, 0, ',', '.')}}</h6>

                                            <!-- Button modal -->
                                            <button type="button" class="btn custom-product-selection-button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#productModal{{$product->id}}">
                                                Seleccionar
                                            </button>
                                        </div>
                                    </div>
                                </td>

                                <!-- Product Modal -->

                                <div class="modal portfolio-modal fade mt-5" id="productModal{{$product->id}}"
                                     tabindex="-1"
                                     aria-labelledby="portfolioModal1"
                                     aria-hidden="true">

                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-header" style="background: rgba(255,255,255,0.9)">
                                            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-content" style="background: rgba(255,255,255,0.9)">
                                            <div class="modal-body">

                                                <div class="container">

                                                    <div class="row">

                                                        <div class="col-12 col-md-6 mt-3 mb-3 rounded-3"
                                                             style="background-color: white">
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                 class="card-img-top custom-levitation-effect" alt="Product">
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <h1 class="text-center fw-bolder align-middle mt-3">{{$product->name}}</h1>
                                                            <h5 class="fw-bolder mt-4">Descripción:</h5>
                                                            <p>{{$product->description}}</p>
                                                            <h5 class="mt-4">Precio
                                                                unitario:&nbsp;<strong>$&nbsp;{{number_format($product->price, 0, ',', '.')}}</strong>
                                                            </h5>
                                                            <div class="row d-flex justify-content-center mt-3 mt-md-0">
                                                                <a href="{{url('/addProduct/' . $product->id)}}"
                                                                   class="btn custom-product-selection-button w-25">Agregar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <td>
                                <div class="card custom-card" style="width: 6rem; margin: 0.7rem;">
                                    <a href="{{ route('category.products', ['category' => $category->id]) }}" class="btn btn-primary" id="button3">Ver más...</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
    </div><br>
@endsection

@section('alertsScript')
    <script>
        // Confirmation alert
        $('.confirmation_alert').submit(function (e) {
            e.preventDefault()
            Swal.fire({
                title: '¿Desea finalizar la orden?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#a1bcff',
                confirmButtonText: 'Si, finalizar',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d78aea',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
        @if(session('errorMessage') == 'stockError')
        Swal.fire({
            title: 'No hay más unidades de este producto',
            icon: 'error',
            confirmButtonColor: '#a1bcff',
        })
        @endif
        @if(session('message') == 'successfulDelivery')
        Swal.fire({
            title: 'Solicitud de domicilio realizada correctamente',
            text: 'Cualquier inquietud no dudes en contactarnos.',
            icon: 'success',
            confirmButtonColor: '#5febc5',
        })
        @endif
    </script>

@endsection
