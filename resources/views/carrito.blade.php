<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Carrito</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->

    <style>
        .estilo-marca {
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 900 !important;
        font-size: 1.5rem !important;
        letter-spacing: 1px;
        text-transform: uppercase;
        vertical-align: middle;
        color: #ffffff !important;
    }

    .estilo-marca-2 {
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 1000 !important;
        font-size: 1.5rem !important;
        letter-spacing: 1px;
        text-transform: uppercase;
        vertical-align: middle;
            color: #000000 !important;
    }

    .navbar-personalizada {
        background-color: #1a1d20 !important;
        border-bottom: 2px solid #333;
    }

    .navbar-personalizada .nav-link {
        color: white !important;
    }

    .navbar-toggler {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }

    .navbar-toggler-icon {
        filter: invert(1);
    }

    #btnArriba {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #1a1d20;
        color: white;
        border: none;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        display: none;
        z-index: 999;
    }

</style>
</head>
<body>
    
    <!--Barra de navegacion-->
<nav class="navbar navbar-expand-sm navbar-personalizada">
    <div class="container-fluid">
    <a class="navbar-brand mx-4 text-danger-emphasis estilo-marca" href="{{ url('/pagina-principal') }}">
        <img src="{{ asset('Img/LogoOscuro.png') }}" class="rounded-circle bg-dark p-1 me-2" width="54" height="54" alt="logo">
        <span class="estilo-marca">The good taste</span></a> <!--<span>, te aseguras de que el estilo de fuente solo toque a las letras y no afecte a otros elementos que metas en el <a>-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-link active mx-2" aria-current="page" href="{{ url('/pagina-principal') }}">
            <h2 class="text-lg pt-1 fs-6">Inicio</h2>
        </a>
        <a class="nav-link mx-2 text-black" href="{{ url('/catalogo') }}">
            <h2 class="text-lg pt-1 fs-6">Catálogo</h2>
        </a>
        <a class="nav-link mx-2 text-black" href="{{ url('/comercializacion') }}">
            <h2 class="text-lg pt-1 fs-6">Comercialización</h2>
        </a>
        <a class="nav-link mx-2 text-black" href="{{ url('/contacto') }}">
            <h2 class="text-lg pt-1 fs-6">Contáctanos</h2>
        </a>
    <a class="nav-link mx-2 text-black" href="{{ url('/quienes-somos') }}">
            <h2 class="text-lg pt-1 fs-6">¿Quiénes somos?</h2>
        </a>
        <a class="nav-link mx-2 text-black" href="{{ url('/terminos-y-usos') }}">
            <h2 class="text-lg pt-1 fs-6">Términos y Usos</h2>
        </a>
        </div>
    </div>
    </div>
</nav>

    <div class="container mt-5">
        <h2 class="mb-4">Pronto estará disponible esta funcionalidad, gracias por su paciencia.</h2>
    </div>

</body>
</html>