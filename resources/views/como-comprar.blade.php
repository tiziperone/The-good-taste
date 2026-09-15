@extends('layouts.app')

@section('titulo', 'The Good Taste - ¿Cómo comprar?')

@section('contenido')
<div class="container mt-4 mb-4">
    @include('componentes.botonesAtrasAdelante')
</div>

<hr class="border-warning border-2 opacity-100">

<div class="container">
    <h1 class="text-center text-light display-3 mt-5 fw-bold">¿Cómo comprar?</h1>

    <div class="row justify-content-center">
        <p class="text-center text-light display-6 mt-3 mb-5">En The Good Taste trabajamos para que disfrutes de comida casera...</p>
    </div>

    <!-- Tarjetas de Información -->
    <div class="row justify-content-center mb-5 pb-4 border-bottom border-secondary">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mt-3 p-3 mx-auto shadow border border-3 border-warning bg-dark text-white h-100" style="width: 100%; max-width: 22rem;">
                <img src="{{ asset('Img/repartidor.png') }}" class="card-img-top w-50 mx-auto mt-2" alt="Formas de entrega">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-warning text-center">Formas de entrega</h5>
                    <p class="card-text text-center mb-3">Opciones para que elijas la que mejor se adapte a vos:</p>
                    <ul class="list-group list-group-flush fw-bold bg-dark text-light">
                        <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-shop text-warning me-2"></i> Retiro en el local.</li>
                        <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-bicycle text-warning me-2"></i> Entrega a domicilio.</li>
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
                        <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-box-seam text-warning me-2"></i> Embalaje seguro.</li>
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
                        <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-cash text-warning me-2"></i> Efectivo.</li>
                        <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-bank text-warning me-2"></i> Transferencia Bancaria.</li>
                        <li class="list-group-item bg-dark text-light border-secondary"><i class="bi bi-wallet2 text-warning me-2"></i> Billeteras virtuales.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- PASOS DE COMPRA -->
    <div class="row justify-content-center mt-5 mb-5">
        <h2 class="text-center fw-bold mb-5 display-5 text-warning">¿Cómo realizar un pedido?</h2>
        <div class="col-12 col-lg-10">
            <!-- PASO 1 -->
            <div class="row align-items-center mb-4 pb-4">
                <div class="col-md-6 order-md-1 order-2 mt-4 mt-md-0 text-center">
                    <div class="row g-2 justify-content-center">
                        <div class="col-6"><img src="{{ asset('Img/inicarSesion.webp') }}" class="img-fluid rounded shadow border border-2 border-warning" alt="Iniciar Sesión"></div>
                        <div class="col-6"><img src="{{ asset('Img/registrarte.webp') }}" class="img-fluid rounded shadow border border-2 border-warning" alt="Registrarse"></div>
                    </div>
                </div>
                <div class="col-md-6 order-md-2 order-1">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning text-dark rounded-circle d-flex justify-content-center align-items-center fw-bold fs-3 me-3 shadow" style="width: 60px; height: 60px; min-width: 60px;">1</div>
                        <h3 class="fw-bold mb-0">Ingresá a tu cuenta</h3>
                    </div>
                    <p class="fs-5 text-secondary">Para comenzar, <a href="{{ url('/inicio-sesion') }}" class="text-warning fw-bold text-decoration-none">Iniciá Sesión</a> o podés <a href="{{ url('/registro') }}" class="text-warning fw-bold text-decoration-none">Crear tu Cuenta</a> rápidamente.</p>
                </div>
            </div>

            <div class="row text-center d-none d-md-flex justify-content-center mb-4"><i class="bi bi-chevron-double-down text-warning" style="font-size: 3rem; opacity: 0.5;"></i></div>

            <!-- PASO 2 -->
            <div class="row align-items-center mb-4 pb-4">
                <div class="col-md-6 order-md-1 order-1 text-md-end">
                    <div class="d-flex align-items-center justify-content-md-end mb-3">
                        <h3 class="fw-bold mb-0 me-3">Elegí lo que querés comer</h3>
                        <div class="bg-warning text-dark rounded-circle d-flex justify-content-center align-items-center fw-bold fs-3 shadow" style="width: 60px; height: 60px; min-width: 60px;">2</div>
                    </div>
                    <p class="fs-5 text-secondary">Navegá por nuestro <a href="{{ url('/catalogo') }}" class="text-warning fw-bold text-decoration-none">catálogo</a> y hacé click en el botón amarillo de <strong>Comprar</strong> o agregalo al carrito.</p>
                </div>
                <div class="col-md-6 order-md-2 order-2 mt-4 mt-md-0 text-center text-md-start">
                    <img src="{{ asset('Img/elegirProducto.webp') }}" class="img-fluid rounded shadow border border-2 border-warning w-75" alt="Elegir Producto">
                </div>
            </div>

            <div class="row text-center d-none d-md-flex justify-content-center mb-4"><i class="bi bi-chevron-double-down text-warning" style="font-size: 3rem; opacity: 0.5;"></i></div>

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
                    <p class="fs-5 text-secondary">En la pantalla final, elegí tu <strong>Método de Entrega</strong> y tu <strong>Método de Pago</strong>. ¡Nosotros nos encargamos del resto!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card p-4 shadow text-center bg-warning text-dark border border-3 border-dark rounded-4">
                <h4 class="fw-bold mb-3 d-flex align-items-center justify-content-center">
                    <i class="bi bi-exclamation-triangle-fill fs-2 me-3"></i> Información Importante
                </h4>
                <p class="fs-5 fw-bold mb-0">Todos nuestros productos son caseros. Se recomienda pedir con anticipación. Los tiempos de entrega pueden variar según la demanda.</p>
            </div>
        </div>
    </div>
</div>
@endsection