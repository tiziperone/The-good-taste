<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Compra</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet"> <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>

<body>

    @include('componentes.navbar')

    <div style="position: relative;">
        <div style="position: absolute; top: 20px; left: 20px; z-index: 100;" class="d-flex gap-2">
            <button onclick="history.back()" class="btn-navegacion" title="Volver atrás">
                <i class="bi bi-arrow-left"></i>
            </button>

            <button onclick="history.forward()" class="btn-navegacion" title="Ir adelante">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>


    <div class="container mt-5">
        <h2 class="mb-4">Pronto estará disponible esta funcionalidad, gracias por su paciencia.</h2>
    </div>

    @include('componentes.footer')

</body>

</html>