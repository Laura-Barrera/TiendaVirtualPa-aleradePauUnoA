@extends('welcome')
@section('about')
    <header class="masthead p-4">
        <div class="container">

                <div class="row align-items-start">
                    <div class="col">
                        <img class="rounded-circle" src="{{asset('img/payment/error.png')}}" style="width: 400px"  alt=""/>

                    </div>
                    <div class="col">
                        <p class="text-muted" style="font-size: 25px">Error al realizar el pago</p>
                    </div>
                </div>


            </div>
        </div>
    </header>
@endsection
