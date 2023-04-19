@extends('welcome')
@section('addressShipping')

    @php
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        $preference = new MercadoPago\Preference();
        $preference->back_urls = array(
            "success" => route('successfulPayment'),
            "failure" => route('errorPayment'),
            "pending" => route('pendingPayment')
        );
        $preference->auto_return = "approved";

        foreach (session('listOfProducts') as $selectedProduct){

            $item = new MercadoPago\Item();
            $item->title = $selectedProduct->name;
            $item->quantity =$selectedProduct->stockAmount;
            $item->unit_price = $selectedProduct->price;
            $prods[]=$item;
        }
        $preference->items = $prods;
        $preference->save();
        // Crea un ítem en la preferencia

    @endphp
    <br>
    <div class="container">
        <div class="container" style="display: flex; justify-content: left">
            <div class="col-6">
                <div class="card" style="background-color: #aef0ff">
                    <div class="card-header d-flex align-items-center justify-content-center">
                        <span class="text-black fw-bolder " style="font-size: 25px" ;>Información de pago </span>
                    </div>
                    <form action="{{url('/finalizeOrder')}}" method="post" enctype="multipart/form-data"
                          style="background-color: white">
                        @csrf

                        @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Seccion informacion-->
                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="name">Nombre</label>
                            <input type="text" class="form-control" name="name"
                                   onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
                                   value="{{isset($name)?$name:old('name')}}" required>
                        </div>

                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="lastName">Apellidos</label>
                            <input type="text" class="form-control" name="lastName"
                                   onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
                                   value="{{isset($lastName)?$lastName:old('lastName')}}" required>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="documentType">Tipo de documento</label>
                            <select class="form-select form-control" id="documentType" name="documentType"
                                    required="required">
                                <option
                                    value="Cedula de ciudadania"{{'documentType' == "Cedula de ciudadania"? 'selected': ''}}>
                                    Cédula de
                                    ciudadania
                                </option>
                                <option
                                    value="Cedula de extranjeria"{{'documentType' == "Cedula de extranjeria"? 'selected': ''}}>
                                    Cédula de
                                    extranjería
                                </option>
                                <option value="NIT"{{'documentType' == "NIT"? 'selected': ''}}>NIT</option>
                            </select>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="documentNumber">Nro. Documento</label>
                            <input type="number" class="form-control" name="documentNumber"
                                   value="{{isset($documentNumber)?$documentNumber:old('documentNumber')}}" required>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="phoneNumber">Nro. Celular</label>
                            <input type="number" class="form-control" name="phoneNumber"
                                   value="{{isset($phoneNumber)?$phoneNumber:old('phoneNumber')}}" required>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address"
                                   value="{{isset($address)?$address:old('address')}}" required>
                        </div>

                        <div class="form-group mt-2" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="{{isset($email)?$email:old('email')}}" required>
                        </div>
                        <br>
                        <!--fin seccion informacion -->

                        <!--seccion direccion-->
                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="shippingAddress">Dirección envío</label>
                            <input type="text" class="form-control" name="shippingAddress"
                                   value="{{isset($shippingAddress)?$shippingAddress:old('shippingAddress')}}" required>
                        </div>

                        <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                            <label class="text-black" for="department">Departamento</label>
                            <select class="form-select form-select-lg" name="department" id="department"
                                    style="width: 100%"
                                    value="{{isset($department)?$department:old('department')}}" required>
                            </select>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="city">Ciudad</label><br>
                            <select class="form-select form-select-lg" name="city" id="city" style="width: 100%"
                                    value="{{isset($city)?$city:old('city')}}"
                                    required>
                            </select>
                        </div>
                        <br>

                        <!-- fin seccion direccion-->

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="pago-contra-entrega"></label><input type="radio" name="paymentMethod"
                                                                            id="pago-contra-entrega"
                                                                            onclick="cleanMercadopago()"
                                                                            value="pago-contra-entrega" required checked>
                            <label class="text-black" for="pagoCEnt">Pago Contra Entrega</label>
                        </div>

                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="pago-fisico"></label><input type="radio" name="paymentMethod" id="pago-fisico"
                                                                    onclick="cleanMercadopago()" value="pago-fisico">
                            <label class="text-black" for="pagoPFisico">Pago en punto físico</label>
                        </div>
                        <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px">
                            <label for="pago-fisico"></label><input type="radio" name="paymentMethod" id="pago-linea"
                                                                    value="pago-linea" onclick="createCookie()">
                            <label class="text-black" for="pagoPFisico">Pago en línea</label>
                        </div>
                        <div id="mercadopago"></div>

                        <div class="mt-3 mb-3 d-flex align-items-end justify-content-center">
                            <input type="submit" class="btn btn-warning" value="Confirmar pedido">
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-6 ">
                <div class="container" style="display: flex; justify-content: center">
                    <div class="col-6" id="movimiento">
                        @if(session('listOfProducts') == null)
                            <img class="img-fluid" src="{{asset('img/orderBackground/bannerOrder.png')}}" width="300"
                                 alt="..."/>
                        @else

                            <div class="card" style="background-color: #aef0ff">

                                <div class="card-header d-flex align-items-center justify-content-center">
                                    <span class="text-black fw-bolder " style="font-size: 25px" ;>Tu pedido</span>
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
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <br>

    <script>



        var createCookie = function () {
            var nombre = document.getElementsByName("name")[0].value;
            var apellidos = document.getElementsByName("lastName")[0].value;
            var tipoDoc = document.getElementsByName("documentType")[0].value;
            var doc = document.getElementsByName("documentNumber")[0].value;
            var celular = document.getElementsByName("phoneNumber")[0].value;
            var direccion = document.getElementsByName("address")[0].value;
            var mail = document.getElementById("email").value;
            var address = document.getElementsByName("shippingAddress")[0].value;
            var departamento = document.getElementsByName("department")[0].value;
            var ciudad = document.getElementsByName("city")[0].value;

            if(nombre!=="" && apellidos!=="" && tipoDoc!=="" && doc!=="" && celular!=="" && direccion!=="" && mail!=="" &&
                address!=="" && departamento!=="" && ciudad!==""){
                //Creación botón mercadopago
                const mp = new MercadoPago("{{config('services.mercadopago.key')}}");
                const bricksBuilder = mp.bricks();
                mp.bricks().create("wallet", "wallet_container", {
                    initialization: {
                        preferenceId: '{{$preference->id}}',
                    },
                    callbacks: {
                        onReady: () => {},
                        onSubmit: () => {
                            document.cookie="nombre="+encript(nombre)
                            document.cookie="apellido="+encript(apellidos)
                            document.cookie="tipoDoc="+encript(tipoDoc)
                            document.cookie="doc="+encript(doc)
                            document.cookie="celular="+encript(celular)
                            document.cookie="direccion="+encript(direccion)
                            document.cookie="mail="+encript(mail)
                            document.cookie="shippingAddres="+encript(address)
                            document.cookie="departamento="+encript(departamento)
                            document.cookie="ciudad="+encript(ciudad)
                            return false
                        },
                        onError: (error) => console.error(error),
                    },
                });
                var div=document.getElementById("mercadopago");
                div.innerHTML='<div id="wallet_container" style="margin-left: 10px; margin-right: 10px"></div>'

                //##############################################3
                //registro cookie

            }else{
                var button=document.getElementById("pago-contra-entrega")
                button.click()
                Swal.fire({
                    title: 'Debe completar todos los campos para seleccionar este tipo de pago',
                    icon: 'error',
                    confirmButtonColor: '#a1bcff',
                })
            }

        }
        var encript=function(text){
            var textEncripted=""
            for (const key in text) {
                textEncripted+=String.fromCharCode(text.charCodeAt(key)+50)
            }

            return textEncripted
        }
        var decript = function (text){
            var textDecripted=""
            for (const key in text) {
                textDecripted+=String.fromCharCode(text.charCodeAt(key)-50)
            }
            return textDecripted
        }
    </script>
@endsection

@section('alertsScript')
    <script>

        var cleanMercadopago = function () {
            var div = document.getElementById('mercadopago');
            div.innerHTML = ""
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
