<nav class="navbar navbar-expand-sm navbar-personalizada">
    <div class="container-fluid">

        <a class="navbar-brand ms-2 mx-sm-4 text-danger-emphasis estilo-marca d-flex align-items-center" href="{{ url('/pagina-principal') }}">
            <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-1 me-2" width="54" height="54" alt="logo">
            <span class="estilo-marca">The good taste</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-link mx-2 {{ request()->is('pagina-principal') ? 'active text-black' : 'text-black' }}" href="{{ url('/pagina-principal') }}">
                    <h2 class="text-lg pt-1 fs-6">Inicio</h2>
                </a>

                <a class="nav-link mx-2 {{ request()->is('catalogo') ? 'active text-black' : 'text-black' }}" href="{{ url('/catalogo') }}">
                    <h2 class="text-lg pt-1 fs-6">Catálogo</h2>
                </a>

                <a class="nav-link mx-2 {{ request()->is('comercializacion') ? 'active text-black' : 'text-black' }}" href="{{ url('/comercializacion') }}">
                    <h2 class="text-lg pt-1 fs-6">Comercialización</h2>
                </a>

                <a class="nav-link mx-2 {{ request()->is('contacto') ? 'active text-black' : 'text-black' }}" href="{{ url('/contacto') }}">
                    <h2 class="text-lg pt-1 fs-6">Contáctanos</h2>
                </a>

                <a class="nav-link mx-2 {{ request()->is('quienes-somos') ? 'active text-black' : 'text-black' }}" href="{{ url('/quienes-somos') }}">
                    <h2 class="text-lg pt-1 fs-6">¿Quiénes somos?</h2>
                </a>

                <a class="nav-link mx-2 {{ request()->is('terminos-y-usos') ? 'active text-black' : 'text-black' }}" href="{{ url('/terminos-y-usos') }}">
                    <h2 class="text-lg pt-1 fs-6">Términos y Usos</h2>
                </a>

            </div>
        </div>
    </div>
</nav>