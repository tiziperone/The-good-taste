<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - ¿Cómo comprar?</title>

    <!-- Optimización de carga -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Scripts en head con defer -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZcgoEq3ZZ1OOFf/X9g5N0M6uF32TijFw1QvQ8FkL/z1OBO6X3/1FhT/41z4f6x" defer></script>
</head>

<body class="bg-dark text-light">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container">
        <h1 class="text-center text-light display-3 mt-5 fw-bold">¿Cómo comprar?</h1>

        <div class="row justify-content-center">
            <p class="text-center text-light display-6 mt-3 mb-5">
                En The Good Taste trabajamos para que disfrutes de comida casera...
            </p>
        </div>

        <!-- Tarjetas de Información (Mantenidas y mejoradas) -->
        <div class="row justify-content-center mb-5 pb-4 border-bottom border-secondary">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card mt-3 p-3 mx-auto shadow border border-3 border-warning bg-dark text-white h-100" style="width: 100%; max-width: 22rem;">
                    <img src="{{ asset('Img/repartidor.png') }}" class="card-img-top w-50 mx-auto mt-2" alt="Formas de entrega">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-warning text-center">Formas de entrega</h5>
                        <p class="card-text text-center mb-3">Opciones para que elijas la que mejor se adapte a vos:</p>
                        <ul class="list-group list-group-flush fw-bold bg-dark text-light">
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-shop text-warning me-2"></i> Retiro en el local (Horario a acordar).</li>
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-bicycle text-warning me-2"></i> Entrega a domicilio (Dentro de la ciudad).</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card mt-3 p-3 mx-auto shadow border border-3 border-warning bg-dark text-white h-100" style="width: 100%; max-width: 22rem;">
                    <img src="{{ asset('Img/caja.png') }}" class="card-img-top w-50 mx-auto mt-2" alt="Tipos de envío">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-warning text-center">Tipos de envío</h5>
                        <p class="card-text text-center mb-3">Envíos cuidados para que todo llegue en perfectas condiciones:</p>
                        <ul class="list-group list-group-flush fw-bold">
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-clock-history text-warning me-2"></i> Entregas programadas.</li>
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-calendar-check text-warning me-2"></i> Pedidos en el día.</li>
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-box-seam text-warning me-2"></i> Embalaje 100% seguro.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card mt-3 p-3 mx-auto shadow border border-3 border-warning bg-dark text-white h-100" style="width: 100%; max-width: 22rem;">
                    <img src="{{ asset('Img/tarjeta-de-credito.png') }}" class="card-img-top w-50 mx-auto mt-2" alt="Medios de pago">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-warning text-center">Formas de pago</h5>
                        <p class="card-text text-center mb-3">Aceptamos diferentes medios para tu comodidad:</p>
                        <ul class="list-group list-group-flush fw-bold">
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-cash text-warning me-2"></i> Efectivo al recibir/retirar.</li>
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-bank text-warning me-2"></i> Transferencia Bancaria.</li>
                            <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-wallet2 text-warning me-2"></i> Billeteras virtuales (MP).</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECCIÓN REDISEÑADA: ¿Cómo realizar un pedido? -->
        <div class="row justify-content-center mt-5 mb-5">
            <h2 class="text-center fw-bold mb-5 display-5 text-warning">¿Cómo realizar un pedido?</h2>

            <div class="col-12 col-lg-10">
                <!-- PASO 1 -->
                <div class="row align-items-center mb-4 pb-4">
                    <div class="col-md-6 order-md-1 order-2 mt-4 mt-md-0 text-center">
                        <div class="row g-2 justify-content-center">
                            <div class="col-6">
                                <img src="{{ asset('Img/inicarSesion.webp') }}" class="img-fluid rounded shadow border border-2 border-warning" alt="Iniciar Sesión">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('Img/registrarte.webp') }}" class="img-fluid rounded shadow border border-2 border-warning" alt="Registrarse">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-md-2 order-1">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning text-dark rounded-circle d-flex justify-content-center align-items-center fw-bold fs-3 me-3 shadow" style="width: 60px; height: 60px; min-width: 60px;">1</div>
                            <h3 class="fw-bold mb-0">Ingresá a tu cuenta</h3>
                        </div>
                        <p class="fs-5 text-secondary">Para comenzar, <strong>Iniciá Sesión</strong> con tu correo y contraseña. Si sos nuevo, podés <strong>Crear tu Cuenta</strong> rápidamente para que podamos guardar tus datos de entrega.</p>
                    </div>
                </div>

                <!-- Flecha divisora -->
                <div class="row text-center d-none d-md-flex justify-content-center mb-4">
                    <i class="bi bi-chevron-double-down text-warning" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>

                <!-- PASO 2 -->
                <div class="row align-items-center mb-4 pb-4">
                    <div class="col-md-6 order-md-1 order-1 text-md-end">
                        <div class="d-flex align-items-center justify-content-md-end mb-3">
                            <h3 class="fw-bold mb-0 me-3">Elegí lo que querés comer</h3>
                            <div class="bg-warning text-dark rounded-circle d-flex justify-content-center align-items-center fw-bold fs-3 shadow" style="width: 60px; height: 60px; min-width: 60px;">2</div>
                        </div>
                        <p class="fs-5 text-secondary">Navegá por nuestro catálogo o elegí tu categoría favorita. Cuando encuentres el plato ideal, hacé click en el botón amarillo de <strong>Comprar</strong> o agregalo al carrito.</p>
                    </div>
                    <div class="col-md-6 order-md-2 order-2 mt-4 mt-md-0 text-center text-md-start">
                        <!-- Nota: Cambia "elegirProducto.png" por "elegirCategoria.png" o úsalos juntos si lo deseas -->
                        <img src="{{ asset('Img/elegirProducto.webp') }}" class="img-fluid rounded shadow border border-2 border-warning w-75" alt="Elegir Producto">
                    </div>
                </div>

                <!-- Flecha divisora -->
                <div class="row text-center d-none d-md-flex justify-content-center mb-4">
                    <i class="bi bi-chevron-double-down text-warning" style="font-size: 3rem; opacity: 0.5;"></i>
                </div>

                <!-- PASO 3 -->
                <div class="row align-items-center mb-5">
                    <div class="col-md-6 order-md-1 order-2 mt-4 mt-md-0 text-center">
                        <img src="{{ asset('Img/completarCompra.webp') }}" class="img-fluid rounded shadow border border-2 border-warning" alt="Completar Compra">
                    </div>
                    <div class="col-md-6 order-md-2 order-1">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning text-dark rounded-circle d-flex justify-content-center align-items-center fw-bold fs-3 me-3 shadow" style="width: 60px; height: 60px; min-width: 60px;">3</div>
                            <h3 class="fw-bold mb-0">Finalizá tu Pedido</h3>
                        </div>
                        <p class="fs-5 text-secondary">En la pantalla final, elegí tu <strong>Método de Entrega</strong> (retiro por local o envío a domicilio) y tu <strong>Método de Pago</strong>. ¡Nosotros nos encargamos del resto!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner de Información Importante -->
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card p-4 shadow text-center bg-warning text-dark border border-3 border-dark rounded-4">
                    <h4 class="fw-bold mb-3 d-flex align-items-center justify-content-center">
                        <i class="bi bi-exclamation-triangle-fill fs-2 me-3"></i>
                        Información Importante
                    </h4>
                    <p class="fs-5 fw-bold mb-0">
                        Todos nuestros productos son caseros. Se recomienda pedir con anticipación.
                        Los tiempos de entrega pueden variar según la demanda.
                    </p>
                </div>
            </div>
        </div>

    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

</body>

</html>