<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image/png">
    <title>The Good Taste - Compra</title>

    <!-- Optimización de carga -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Scripts en head con defer -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZcgoEq3ZZ1OOFf/X9g5N0M6uF32TijFw1QvQ8FkL/z1OBO6X3/1FhT/41z4f6x" defer></script>

    <style>
        .form-control::placeholder {
            color: #adb5bd !important;
            opacity: 0.6;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        .style-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .style-scroll::-webkit-scrollbar-track {
            background: #212529;
        }

        .style-scroll::-webkit-scrollbar-thumb {
            background: #ffc107;
            border-radius: 4px;
        }
    </style>
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container mt-5 mb-5">
        <h2 class="fw-bold text-warning mb-4" style="font-family: 'Montserrat', sans-serif;">
            <i class="bi bi-credit-card-2-front-fill me-2"></i> Finalizar tu Pedido
        </h2>

        <form action="#" method="POST" id="form-checkout" onsubmit="procesarCompra(event)">
            @csrf
            <div class="row g-4">
                <div class="col-12 col-lg-8">
                    <!-- Método de Entrega -->
                    <div class="card bg-dark border-secondary shadow mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-warning mb-3"><i class="bi bi-truck me-2"></i> Método de Entrega</h5>
                            <!-- Tu código de selects, options y campos de dirección va aquí -->
                            <!-- Lo abrevio en este snippet por longitud, mantenés el interior del <div class="card-body p-4"> original de tu código -->
                            @include('componentes.compra_entrega')
                        </div>
                    </div>

                    <!-- Método de Pago -->
                    <div class="card bg-dark border-secondary shadow">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-warning mb-3"><i class="bi bi-wallet2 me-2"></i> Método de Pago</h5>
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="p-3 bg-secondary rounded border border-warning d-flex align-items-center gap-3 h-100 cursor-pointer">
                                        <input type="radio" name="metodo_pago" value="efectivo" class="form-check-input" checked>
                                        <div>
                                            <span class="d-block fw-bold text-white"><i class="bi bi-cash-coin text-warning me-1"></i> Efectivo</span>
                                            <small class="text-light opacity-75">Abonás al recibir/retirar</small>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="p-3 bg-secondary rounded border border-secondary d-flex align-items-center gap-3 h-100 cursor-pointer">
                                        <input type="radio" name="metodo_pago" value="transferencia" class="form-check-input">
                                        <div>
                                            <span class="d-block fw-bold text-white"><i class="bi bi-bank text-warning me-1"></i> Transferencia / Alias</span>
                                            <small class="text-light opacity-75">Te enviaremos los datos de transferencia a tu correo!</small>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resumen de Compra -->
                <div class="col-12 col-lg-4">
                    <div class="card text-bg-dark border-warning shadow position-sticky" style="top: 20px;">
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold text-warning mb-4 pb-2 border-bottom border-secondary">Resumen de Compra</h4>

                            <div class="mb-4 style-scroll" style="max-height: 250px; overflow-y: auto; padding-right: 5px;">
                                @php $total = 0; @endphp
                                @foreach($carrito as $item)
                                @if($item->producto)
                                @php
                                $pId = $item->producto->id;
                                $pNombre = $item->producto->nombre;
                                $pStock = $item->producto->stock;
                                $pPrecio = $item->producto->precio;
                                $pCantidad = $item->cantidad;

                                $subtotal = $pPrecio * $pCantidad;
                                $total += $subtotal;

                                $btnMenos = "cambiarCantidad($pId, -1, $pStock, $pPrecio)";
                                $btnMas = "cambiarCantidad($pId, 1, $pStock, $pPrecio)";
                                @endphp
                                <div class="d-flex justify-content-between align-items-center mb-3" id="item-row-{{ $pId }}">
                                    <div>
                                        <span class="fw-bold text-light d-block small nombre-producto">{{ $pNombre }}</span>
                                        <div class="d-flex align-items-center mt-2">
                                            <button type="button" class="btn btn-sm btn-outline-warning py-0 px-2" onclick="{{ $btnMenos }}"><i class="bi bi-dash"></i></button>
                                            <input type="number" id="cant-{{ $pId }}" value="{{ $pCantidad }}" class="form-control form-control-sm bg-transparent text-white border-0 text-center p-0 mx-1 shadow-none fw-bold" style="width: 35px;" readonly>
                                            <button type="button" class="btn btn-sm btn-outline-warning py-0 px-2" onclick="{{ $btnMas }}"><i class="bi bi-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="fw-bold text-warning small d-block" id="subtotal-{{ $pId }}">$ {{ number_format($subtotal, 0, ',', '.') }}</span>
                                        <small class="text-secondary" style="font-size: 0.7rem;">Stock: {{ $pStock }}</small>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-between mb-4 fs-4 border-top border-secondary pt-3">
                                <span class="fw-bold text-warning">Total:</span>
                                <span class="fw-bold text-warning" id="total-compra">$ {{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold text-dark shadow py-3">
                                Confirmar Pedido <i class="bi bi-check-circle-fill ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Modal de éxito (sin alterar su código) -->
    <!-- ... -->

    @include('componentes.footer')

    <!-- Tus scripts JS de procesarCompra, cambiarCantidad, etc. van aquí tal cual -->
    <script>
        // Tu código de funciones toggleEnvio, cargarDireccionGuardada, etc.
    </script>
</body>

</html>