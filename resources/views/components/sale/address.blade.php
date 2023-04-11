@extends('welcome')
@section('addressShipping')
    <br>
    <div class="container">
        <div class="container" style="display: flex; justify-content: left">
            <div class="col-6">
                <div class="card" style="background-color: #aef0ff">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <span class="text-black fw-bolder " style="font-size: 25px" ;>Información de envio</span>
                    </div>
                    <form style="background-color: white">
                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="addressShipping">Dirección envío</label>
                            <input type="text" class="form-control" name="addressShipping"
                                   value="{{isset($shipingOrder->address)?$shipingOrder->address:old('addressShiping')}}" required>
                        </div>

                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="department">Departamento</label>
                            <select class="form-select form-select-lg" name="department" id="department" style="width: 100%"
                                    value="{{isset($shipingOrder->department)?$shipingOrder->department:old('department')}}" required>
                            </select>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="city">Ciudad</label><br>
                            <select class="form-select form-select-lg" name="city" id="city" style="width: 100%"
                                    value="{{isset($shipingOrder->city)?$shipingOrder->city:old('city')}}" required>
                            </select>
                        </div><br>

                        <div class="col-12" style="text-align: center">
                            <a href="{{ route('informationCustomer') }}" class="btn btn-danger" id="button2">Atrás</a>
                            <a href="/salePayment" class="btn btn-danger" id="button">Siguiente</a>
                        </div><br>
                    </form>
                </div>
            </div>
            <div class="col-6 ">
                <div class="container" style="display: flex; justify-content: center">
                    <div class="col-10">
                        @if(session('listOfProducts') == null)
                            <img class="img-fluid" src="{{asset('img/orderBackground/bannerOrder.png')}}" width="300"
                                 alt="..."/>
                        @else

                            <div class="card" style="background-color: #aef0ff">

                                <div class="card-header d-flex align-items-center justify-content-center">
                                    <span class="text-black fw-bolder " style="font-size: 25px";>Tu pedido</span>
                                </div>

                                <ul class="list-group list-group-flush" style="overflow-y: auto; height: 13rem;">

                                    <li class="list-group-item" style="background-color: #d78aea; margin-top: 1px">

                                        <div class="row">

                                            <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">Cantidad</span>
                                            </div>

                                            <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">Producto</span>
                                            </div>

                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-black fs-6">Precio</span>
                                            </div>

                                            <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-black fs-6">Acción</span>
                                            </div>

                                        </div>

                                    </li>

                                    <li class="list-group-item" style="border-color: #5febc5; margin-top: 1px">

                                        @foreach(session('listOfProducts') as $selectedProduct)

                                            <div class="row mb-2">

                                                <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">{{$selectedProduct->stockAmount}}</span>
                                                </div>

                                                <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-black fs-6">{{$selectedProduct->name}}</span>
                                                </div>

                                                <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-black fs-6">$&nbsp;{{number_format(($selectedProduct->stockAmount * $selectedProduct->price), 0, ',', '.')}}</span>
                                                </div>

                                                <div class="col-2 d-flex justify-content-center align-items-center">
                                                    <form action="{{url('/removeProduct')}}" method="post">
                                                        @method("delete")
                                                        @csrf
                                                        <input type="hidden" name="indice" value="{{$loop->index}}">
                                                        <button type="submit" class="btn btn-danger"
                                                                style="background-color: rgba(255,0,0,0.5); color: white">
                                                            <i class="fa-solid fa-trash"> </i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>

                                        @endforeach
                                    </li>
                                </ul>
                            </div><br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <script>
        // Leer el enlace JSON
        fetch('https://www.datos.gov.co/resource/xdk5-pm3f.json')
            .then(response => response.json())
            .then(data => {
                // Obtener los departamentos únicos y ordenarlos alfabéticamente
                const departamentos = [...new Set(data.map(d => d.departamento))].sort();
                const departamentoSelect = document.querySelector('#department');
                // Agregar las opciones al select de departamentos
                departamentos.forEach(d => {
                    const option = document.createElement('option');
                    option.value = d;
                    option.textContent = d;
                    departamentoSelect.appendChild(option);
                });
                // Mostrar los municipios del primer departamento en el select de municipios y ordenarlos alfabéticamente
                const municipios = data.filter(d => d.departamento === departamentos[0]).map(d => d.municipio).sort();
                const municipioSelect = document.querySelector('#city');
                municipios.forEach(m => {
                    const option = document.createElement('option');
                    option.value = m;
                    option.textContent = m;
                    municipioSelect.appendChild(option);
                });
                // Actualizar los municipios cuando se cambia el departamento y ordenarlos alfabéticamente
                departamentoSelect.addEventListener('change', e => {
                    municipioSelect.innerHTML = ''; // Limpiar el select de municipios
                    const selectedDepartamento = e.target.value;
                    const municipios = data.filter(d => d.departamento === selectedDepartamento).map(d => d.municipio).sort();
                    municipios.forEach(m => {
                        const option = document.createElement('option');
                        option.value = m;
                        option.textContent = m;
                        municipioSelect.appendChild(option);
                    });
                });
            })
            .catch(error => console.error(error));
    </script>
@endsection
