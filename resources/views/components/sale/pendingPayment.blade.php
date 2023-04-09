@extends('welcome')
@section('about')
    <header class="masthead p-4">
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <img class="rounded-circle" src="{{asset('img/payment/pending.png')}}" style="width: 200px"  alt=""/>

                </div>
                <div class="col">
                    <p class="text-muted" style="font-size: 25px">Pago pendiente de aprobación</p>
                </div>
            </div>
        </div>
    </header>
@endsection
