<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Recibido</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>

<body class="bg-dark">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <!--Se realiza una estructura de columnas para mostrar que el mensaje se envio con exito
tambien se da la posibilidad de volver al inicio del sitio web (pagina principal)-->
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 text-center">

                <div class="p-5 rounded-4 shadow-lg" style="background-color: #2b3035; border: 1px solid rgba(255, 193, 7, 0.2);">

                    <i class="bi bi-check-circle-fill text-success mb-4" style="font-size: 5rem; filter: drop-shadow(0 0 10px rgba(25, 135, 84, 0.5));"></i>

                    <h2 class="fw-bold text-white mb-3 estilo-marca-2 display-6">¡Mensaje enviado con éxito!</h2>

                    <p class="text-light fs-5">
                        Hola <strong class="text-warning">{{ $nombre }}</strong>, gracias por contactarnos.
                    </p>

                    <p class="text-white fs-5 mb-5">
                        Hemos recibido tu mensaje. Pronto te responderemos a <strong class="text-warning">{{ $email }}</strong>.
                    </p>

                    <a href="{{ url('/pagina-principal') }}" class="btn btn-warning btn-lg px-5 py-3 shadow-sm rounded fw-bold fs-5 text-dark">
                        <i class="bi bi-house-door me-2"></i> Volver al Inicio
                    </a>
                </div>

            </div>
        </div>
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

</body>

</html>