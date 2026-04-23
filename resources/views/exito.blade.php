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
    <div class="container mt-5">
        <div class="row justify-content-center"><!--Se centra el contenido dentro de la fila-->
            <div class="col-8 text-center bg-dark p-5"><!--Se crea una columna de 8 unidades, se centra el texto, se le da un fondo claro, padding-->
                <h2 class="text-success">¡Mensaje enviado con éxito!</h2><!--Se muestra un mensaje de éxito con un estilo de texto verde-->
                <p class="text-light mt-4 fs-5">Hola <strong>{{ $nombre }}</strong>, gracias por contactarnos.</p>

                <p class="text-light"> Hemos recibido su mensaje, pronto le responderemos a: <strong>{{ $email }}</strong>.</p>
                <a href="{{ url('/pagina-principal') }}" class="btn btn-primary mt-4">Volver al Inicio</a>

            </div>
        </div>
    </div>
    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

</body>

</html>