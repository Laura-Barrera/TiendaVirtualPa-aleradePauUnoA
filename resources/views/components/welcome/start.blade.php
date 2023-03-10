@extends('welcome')

@section('start')
    <section class="page-section bg-light mt-3" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Te puede interesar</h2>
            </div>

            <div class="card-group">
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/about/1.jpg')}}" alt="Card image cap" style="height: 312px; width: auto">
                    <div class="card-body">
                        <h5 class="card-title">Kit de cuidado para Recien Nacido</h5>
                        <p class="card-text">Este kit contiene elementos esenciales que necesitas para mantener a tu bebé bien. Incluye contiene tijeras de seguridad, cepillo de pelo, peine y cortauñas, termómetro, aspirador nasal y copitos.
                            Disponible para niños y niñas</p>

                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/about/2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Toalla para bebe</h5>
                        <p class="card-text">Lindas Toallas para bebé con Capucha de 75x75 cms para secar y abrigar a tu bebé de pies a cabeza y evitar que se enfríe cuando sale del agua. Ideales como toalla de baño, toalla para piscina y toalla de playa.</p>

                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/about/3.jpg')}}" alt="Card image cap" style="height: 312px; width: auto">
                    <div class="card-body">
                        <h5 class="card-title">Conjunto niño 3 Piezas</h5>
                        <p class="card-text">Conjunto de 3 piezas para tu niño, cada Pieza esta fabricada con los mas altos estandares de calidad, su diseño es unico moderno e infantil para que tu bebe pueda usarlo en en cualquier momento, ademas le brindara a tu bebe la mejor comodidad para que este tranquilo en todo momento</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
