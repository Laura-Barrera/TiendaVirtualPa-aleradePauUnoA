@section('start1')
    <div class="container">
        <div class="text-center">
            <h3 class="section-heading text-uppercase">Elementos de aseo y cuidado</h3>
        </div>

        <div class="row custom-products-section">

            <div id="carouselExampleControls2" class="carousel" data-bs-ride="false">

                <div class="carousel-inner custom-carousel-inner">

                    @foreach($products->slice(5, 9) as $product)

                        <div
                            class="carousel-item custom-carousel-item @if($product == $products[0]) active @endif">

                            <div class="custom-carousel-item-content">

                                <div class="card custom-card">

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

                            </div>

                        </div>

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
                                                    <h5 class="mt-4">Cantidad:
                                                        <input type="number" value="0" min="0"
                                                               max={{number_format($product->stockAmount, 0, ',', '.')}} step="1"/>
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

                </div>

                <button class="carousel-control-prev custom-carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControls2"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next custom-carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControls2"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>

        </div>

    </div>

    </div>
@endsection

@section('makeOrderScript1')
    <script>
        let multipleCardCarousel1 = document.querySelector("#carouselExampleControls2");
        if (window.screen.width >= 576 || window.screen.width >= 1200) {
            new bootstrap.Carousel(multipleCardCarousel1, {interval: false,});
            let carouselWidth = $(".carousel-inner")[0].sscrollWidth;
            let cardWidth = $(".carousel-item").width();
            let scrollPosition = 0;
            $("#carouselExampleControls2 .carousel-control-next").on("click", function () {
                if (window.screen.width >= 576 && window.screen.width < 1200) {
                    console.log('Holaaaa')
                    if (scrollPosition < carouselWidth - cardWidth * 3) {
                        scrollPosition += cardWidth;
                        $("#carouselExampleControls2 .carousel-inner").animate({scrollLeft: scrollPosition}, 750);
                    }
                }
                if (window.screen.width >= 1200) {
                    $(multipleCardCarousel1).removeClass("slide")
                    if (scrollPosition < carouselWidth - cardWidth * 4) {
                        scrollPosition += cardWidth;
                        $("#carouselExampleControls2 .carousel-inner").animate({scrollLeft: scrollPosition}, 600);
                    }
                }
            });
            $("#carouselExampleControls2 .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselExampleControls2 .carousel-inner").animate({scrollLeft: scrollPosition}, 600);
                }
            });
        } else if (window.screen.width < 576) {
            $(multipleCardCarousel1).addClass("slide");
        }
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
