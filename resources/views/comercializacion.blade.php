<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Comercialización</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <!-- Importamos la fuente "Montserrat" desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">



</head>

<body class="bg-dark">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container">

        <h1 class="text-center text-light display-3 mt-5 fw-bold">
            Comercialización
        </h1>

        <div class="row justify-content-center">
            <p class="text-center text-light display-6 mt-3 mb-5">
                En The Good Taste trabajamos para que disfrutes comida casera...
            </p>

        </div>




        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animada mt-3 p-3 mx-auto shadow border border-3 border-warning bg-dark text-white" style="width: 20rem;">
                    <img src="{{ asset('Img/repartidor.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Formas de entrega</h5>
                        <p class="card-text">Ofrecemos distintas opciones para que elijas la que mejor se adapte a vos:</p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold text-justify">
                        <li class="list-group-item">Retiro en el local: Podés pasar a buscar tu pedido en el horario acordado.</li>
                        <li class="list-group-item text-justify">Entrega a domicilio: Realizamos envíos dentro de la zona, coordinando día y horario previamente.</li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animada mt-3 p-3 mx-auto shadow border border-3 border-warning bg-dark text-white" style="width: 20rem;">
                    <img src="{{ asset('Img/caja.png') }}" class="card-img-top" alt="...">
                    <div class="card-body text-justify">
                        <h5 class="card-title fw-bold">Tipos de envío</h5>
                        <p class="card-text">Nuestros envíos se realizan de manera cuidada para garantizar que los productos lleguen en perfectas condiciones:</p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold text-justify text-white">
                        <li class="list-group-item">Entregas programadas.</li>
                        <li class="list-group-item">Pedidos preparados en el día.</li>
                        <li class="list-group-item">Embalaje seguro para conservar la calidad de los alimentos.</li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-animada mt-4 p-3 mx-auto shadow border border-3 border-warning bg-dark text-white" style="width: 20rem;">
                    <img src="{{ asset('Img/tarjeta-de-credito.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Formas de pago</h5>
                        <p class="card-text">Aceptamos diferentes medios de pago para tu comodidad:</p>
                    </div>
                    <ul class="list-group list-group-flush fw-bold">
                        <li class="list-group-item">Efectivo.</li>
                        <li class="list-group-item">Transferencia Bancaria.</li>
                        <li class="list-group-item">Billeteras virtuales.</li>
                    </ul>
                </div>
            </div>
        </div>






        <div class="row justify-content-center mt-5 text-center">

            <h3 class="fw-bold mb-4">¿Cómo realizar un pedido?</h3>

            <!-- Paso 1 -->
            <div class="col-12 col-md-4">
                <div class="card p-3 shadow h-100">
                    <img src="{{ asset('Img/imagen 1.jpg') }}" class="card-img-top w-100 mx-auto mt-3">
                    <div class="card-body">
                        <p class="fw-bold">1. Vas a catálogo, le das click a la imágen de lo que quieras comer.</p>
                    </div>
                </div>
            </div>

            <!-- Paso 2 -->
            <div class="col-12 col-md-4">
                <div class="card p-3 shadow h-100">
                    <img src="{{ asset('Img/imagen 2.jpg') }}" class="card-img-top w-100 mx-auto mt-3">
                    <div class="card-body">
                        <p class="fw-bold">2. Le das click a Comprar</p>
                    </div>
                </div>
            </div>

            <!-- Paso 3 -->
            <div class="col-12 col-md-4">
                <div class="card p-3 shadow h-100">
                    <img src="{{ asset('Img/imagen 3.jpg') }}" class="card-img-top w-100 mx-auto mt-3">
                    <div class="card-body">
                        <p class="fw-bold">3. Por último coordinamos pago y entrega.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-5 mb-3">
            <div class="col-md-6">
                <div class="card p-4 shadow text-center bg-warning text-dark border border-3 border-dark">

                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-exclamation-triangle-fill">
                            <p class="titulo-black text-dark">Información importante</p>
                        </i>

                    </h5>

                    <p class="texto-bold fw-bold mb-3 text-dark">
                        Todos nuestros productos son caseros. Se recomienda pedir con anticipación.
                        Los tiempos de entrega pueden variar según la demanda.
                    </p>

                </div>
            </div>
        </div>

    </div>


    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>