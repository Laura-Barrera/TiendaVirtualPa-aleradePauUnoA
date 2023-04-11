@extends('welcome')

@section('showProducts')
    <br><div class="row" style="overflow-x: auto;">
        <div class="btn-group">
            @foreach ($categories as $category1)
                <a href="{{ route('category.products', ['category' => $category1->id]) }}" class="btn btn-outline-warning"
                   aria-current="page" style="font-size: 18px; white-space: nowrap;">{{$category1->name}}</a>
            @endforeach
        </div>
    </div>

    <br>
    <div class="card-body" style="background-color: white">
        <h1 style="text-align: center; color: #a1bcff"><b>{{ $category->name }}</b></h1>
        <h4 style="text-align: center;">{{ $category->description }}</h4>

        <div class="table-responsive">
            <table>
                <tr>
                    @foreach ($products as $product)
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
                </tr>
            </table>
        </div>
    </div><br>
@endsection
