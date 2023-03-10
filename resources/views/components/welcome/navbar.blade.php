<!-- Navigation-->
<nav class="navbar navbar-expand-lg custom-navbar" id="mainNav">
    <div class="container">
        <img src="{{asset('img/logos/logo.png')}}" id="logo" width="100px" alt=""/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="color: black">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="/start">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="/catalogo">Catalogo</a></li>
                <li class="nav-item"><a class="nav-link" href="/nosotros">Nosotros</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}" id="link-perfil"> Perfil</a>
                        </li>
                    @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Iniciar sesión
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li><a class="button-select dropdown-item" href="{{ route('login') }}"
                                       data-bs-toggle="modal" data-bs-target="#loginModal"> Iniciar Sesión</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                @if (Route::has('register'))
                                    <li><a class="button-select dropdown-item" href="{{ route('register') }}"
                                           data-bs-toggle="modal"
                                           data-bs-target="#registerModal">Registrarse</a></li>
                                @endif

                            </ul>
                        </li>

                    @endauth
                @endif

            </ul>
        </div>
    </div>
</nav>

