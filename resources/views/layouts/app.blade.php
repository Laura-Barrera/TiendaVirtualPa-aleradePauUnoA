<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logos/logo.png') }}">

    <!-- Title -->
    <title>Pañalera Pau Uno A</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/globalStyles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboardStyles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clockpicker.css') }}" rel="stylesheet">
</head>
<body id="body" class="body_move">
    <div id="app">

        <header>

            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
            </div>

            <div class="user__navbar">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            @if(Auth::user()->rol->description == 'administrator')
                                Administrador
                            @elseif(Auth::user()->rol->description == 'employee')
                                <span>Empleado</span>
                            @endif

                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('start') }}">
                                <i class="fa-regular fa-file-lines"></i> Página principal
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>

                    </li>

                </ul>

            </div>

        </header>

        <div class="menu__side menu__side_move" id="menu_side">

            <div class="name__page">
                <i class="fa-solid fa-star"></i>
                <span>Pañalera Pau</span>
            </div>

            <div class="container" style="margin-left: 10px;">
                <div style="width: auto; border-style: solid; border-top: 2px; border-color: rgba(255,255,255,0.7);"></div>
            </div>

            <div class="options__menu">

                <a href="{{ route('home') }}" class="{{request()->routeIs('home') ? 'selected' : ''}}">
                    <div class="option">
                        <i class="fa-solid fa-circle-check"></i>
                        @if(Auth::user()->rol->description == 'administrator')
                            <span>Administrador</span>
                        @elseif(Auth::user()->rol->description == 'employee')
                            <span>Empleado</span>
                        @endif
                    </div>
                </a>

                <!-- Admin -->

                @if(Auth::user()->rol->description == 'administrator')

                    <a href="{{ route('employee/management') }}"
                       class="{{request()->routeIs('employee/management') ? 'selected' : ''}}">
                        <div class="option">
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Gestión&nbsp;empleados</span>
                        </div>
                    </a>
                @endif

                @if(Auth::user()->rol->description == 'employee')

                @endif

            </div>

        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/dashboardScript.js')}}"></script>
    <script src="{{asset('js/clockpicker.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener("pageshow", function (event) {
            let historyTraversal = event.persisted ||
                (typeof window.performance != "undefined" &&
                    window.performance.navigation.type === 2);
            if (historyTraversal) {

                window.location.reload();
            }
        });
    </script>
</body>
</html>
