@extends('welcome')
@section('productStyles')
    <style>
        body {

            overflow-x: hidden;
        }

        .custom-menu-section {
            margin-top: 6rem;
            margin-bottom: 6rem;
        }

        .custom-product-selection-button {
            width: 80%;
            color: black;
            font-size: 15px;

            background-color: #0dcaf0;
        }

        .custom-product-selection-button:hover {
            color: #000000;
            font-weight: 600;
            border-color: #d78aea;
            background-color: #d78aea;
        }

        .custom-product-selection-button:focus {
            width: 80%;
            color: black;
            font-size: 15px;
            border-color: #ffffff80;
            background-color: #d78aea;
            box-shadow: none;
        }

        .custom-product-selection-button:focus:hover {
            color: #000000;
            font-weight: 600;
            border-color: #ffffff80;
            background-color: #0dcaf0;
            box-shadow: 0 0 15px #ffffff80;
        }

        @media (min-width: 768px) {
            .custom-menu-section {
                margin-top: 11rem;
                margin-bottom: 5.5rem;
            }
        }

        .custom-products-section {
            margin-top: 1rem;
        }

        .custom-carousel-item-content {
            display: flex;
            justify-content: center;
        }

        .custom-card {
            width: 15rem;
            margin: 0.3rem;
            border: none;
            background-color: #ffffff00;
        }

        .custom-levitation-effect {
            transform: translateY(0px);
            transition: transform 0.5s;
        }

        .custom-levitation-effect:hover {
            transform: translateY(-8px);
        }

        .custom-card-body {
            text-align: center;
        }

        .custom-card-body h5 {
            color: black;
        }

        .custom-card-body h6 {
            color: black;
        }

        .custom-products-section {
            position: relative;
        }

        .custom-carousel-inner {
            padding: 1em;
        }

        .custom-carousel-control-prev,
        .custom-carousel-control-next {
            top: 50%;
            width: 7vh;
            height: 7vh;
            background-color: black;
            transform: translateY(-50%);
        }

        .custom-carousel-control-prev:hover,
        .custom-carousel-control-next:hover {
            background-color: #0dcaf0;
        }

        @media (min-width: 576px) {
            .custom-carousel-item {
                margin-right: 0;
                flex: 0 0 50%;
                display: block;
            }

            .custom-carousel-inner {
                display: flex;
            }
        }

        @media (min-width: 1200px) {
            .custom-carousel-item {
                margin-right: 0;
                flex: 0 0 33.33%;
                display: block;
            }

            .custom-carousel-inner {
                display: flex;
            }
        }
    </style>
@endsection


@section('start')
    <!-- Masthead-->
    <header class="masthead p-4">
        <div class="container">
            <div>
                <table>
                    <tr>
                        <td>
                            <p class="text-muted" style="font-size: 25px"> En la Pañalera de Pau Uno A, encontrarás gran variedad de artículos para bebe, desde ropa para recién nacidos hasta niños de 3 años, productos de aseo, pañales, calzado y accesorios para estimular a tu bebe. Los niños y niñas lucirán un outfit muy cool, podrán desarrollar habilidades y disfrutarán de la mejor comodidad gracias a todos nuestros productos.</p>
                        </td>
                        <td>
                            <img class="rounded-circle" src="{{asset('img/logos/logo.png')}}" style="width: 400px"  alt=""/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </header>


    <section class="page-section bg-light mt-3" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Te puede interesar</h2>
            </div>

            <div class="row custom-products-section">

                <div id="carouselExampleControls" class="carousel" data-bs-ride="false">

                    <div class="carousel-inner custom-carousel-inner">

                        @foreach($products as $product)

                            <div
                                class="carousel-item custom-carousel-item @if($product == $products[0]) active @endif">

                                <div class="custom-carousel-item-content">

                                    <div class="card custom-card">

                                        <img src="{{asset('storage').'/'.$product->image}}"
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
                                                        <img class="img-fluid mt-5 mb-5"
                                                             src="{{asset('storage').'/'.$product->image}}"
                                                             alt="product"/>
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

                    </div>

                    <button class="carousel-control-prev custom-carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next custom-carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>

            </div>

        </div>
    </section>
@endsection

@section('makeOrderScript')
    <script>
        let multipleCardCarousel = document.querySelector("#carouselExampleControls");
        if (window.screen.width >= 576 || window.screen.width >= 1200) {
            new bootstrap.Carousel(multipleCardCarousel, {interval: false,});
            let carouselWidth = $(".carousel-inner")[0].scrollWidth;
            let cardWidth = $(".carousel-item").width();
            let scrollPosition = 0;
            $("#carouselExampleControls .carousel-control-next").on("click", function () {
                if (window.screen.width >= 576 && window.screen.width < 1200) {
                    if (scrollPosition < carouselWidth - cardWidth * 3) {
                        scrollPosition += cardWidth;
                        $("#carouselExampleControls .carousel-inner").animate({scrollLeft: scrollPosition}, 750);
                    }
                }
                if (window.screen.width >= 1200) {
                    $(multipleCardCarousel).removeClass("slide")
                    if (scrollPosition < carouselWidth - cardWidth * 4) {
                        scrollPosition += cardWidth;
                        $("#carouselExampleControls .carousel-inner").animate({scrollLeft: scrollPosition}, 600);
                    }
                }
            });
            $("#carouselExampleControls .carousel-control-prev").on("click", function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselExampleControls .carousel-inner").animate({scrollLeft: scrollPosition}, 600);
                }
            });
        } else if (window.screen.width < 576) {
            $(multipleCardCarousel).addClass("slide");
        }
        // Confirmation alert
        $('.confirmation_alert').submit(function (e) {
            e.preventDefault()
            Swal.fire({
                title: '¿Desea finalizar la orden?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, finalizar',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
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
                confirmButtonColor: '#da0e1e',
            })
            @endif
            @if(session('message') == 'successfulAddedOrder')
            Swal.fire({
                title: 'Producto agregado',
                icon: 'success',
                confirmButtonColor: '#199605',
            })
            @endif


    </script>

@endsection
