@extends('welcome')
@section('about')
    <header class="masthead p-4">
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <img class="rounded-circle" src="{{asset('img/payment/successful.png')}}" style="width: 200px"  alt=""/>

                </div>
                <div class="col">
                    <p class="text-muted" style="font-size: 25px">El pago se realizó satisfactoriamente</p>
                </div>
            </div>
        </div>
    </header>
@endsection
