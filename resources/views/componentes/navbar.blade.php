<nav class="navbar navbar-expand-lg navbar-personalizada">
    <div class="container-fluid">

        <a class="navbar-brand ms-2 mx-sm-4 text-danger-emphasis estilo-marca d-flex align-items-center" href="{{ url('/pagina-principal') }}">
            <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-1 me-2" width="54" height="54" alt="logo">
            <span class="estilo-marca">The good taste</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav w-100">

                <a class="nav-link mx-2 text-lg pt-1 fs-6 {{ request()->is('pagina-principal') ? 'active text-black' : 'text-black' }}" href="{{ url('/pagina-principal') }}">Inicio</a>
                <a class="nav-link mx-2 text-lg pt-1 fs-6 {{ request()->is('catalogo') ? 'active text-black' : 'text-black' }}" href="{{ url('/catalogo') }}">Catálogo</a>
                <a class="nav-link mx-2 text-lg pt-1 fs-6 {{ request()->is('comercializacion') ? 'active text-black' : 'text-black' }}" href="{{ url('/comercializacion') }}">Comercialización</a>
                <a class="nav-link mx-2 text-lg pt-1 fs-6 {{ request()->is('contacto') ? 'active text-black' : 'text-black' }}" href="{{ url('/contacto') }}">Contáctanos</a>
                <a class="nav-link mx-2 text-lg pt-1 fs-6 {{ request()->is('quienes-somos') ? 'active text-black' : 'text-black' }}" href="{{ url('/quienes-somos') }}">¿Quiénes somos?</a>
                <a class="nav-link mx-2 text-lg pt-1 fs-6 {{ request()->is('terminos-y-usos') ? 'active text-black' : 'text-black' }}" href="{{ url('/terminos-y-usos') }}">Términos y Usos</a>

                @auth
                <form method="POST" action="{{ url('/cerrar-sesion') }}" id="logout-form" class="d-none">
                    @csrf
                </form>

                <a class="nav-link mx-2 ms-lg-auto text-lg pt-1 fs-6 d-flex align-items-center text-black"
                    href="{{ url('/cerrar-sesion') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span>Cerrar Sesión</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right ms-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </a>
                @endauth

                @guest
                <a class="nav-link mx-2 ms-lg-auto text-lg pt-1 fs-6 d-flex align-items-center {{ request()->is('inicio-sesion') ? 'active text-black' : 'text-black' }}" href="{{ url('/inicio-sesion') }}">
                    <span>Iniciar Sesión</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle ms-2" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </a>
                @endguest

            </div>
        </div>
    </div>
</nav>