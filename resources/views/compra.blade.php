<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Finalizar Compra</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght=700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
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

        <form action="#" method="POST" id="form-checkout" onsubmit="event.preventDefault(); alert('¡Pedido recibido! Acá integrarás la acción final.');">
            @csrf
            <div class="row g-4">

                {{-- COLUMNA IZQUIERDA: OPCIONES DE ENVÍO Y PAGO --}}
                <div class="col-12 col-lg-8">

                    {{-- Bloque 1: Datos del Cliente --}}
                    <div class="card bg-dark border-secondary shadow mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-warning mb-3"><i class="bi bi-person-fill me-2"></i> Datos de Contacto</h5>
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-secondary small fw-bold">Nombre Completo</label>
                                    <input type="text" class="form-control bg-secondary text-white border-0" required placeholder="Ej: Juan Pérez">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-secondary small fw-bold">Teléfono / WhatsApp</label>
                                    <input type="tel" class="form-control bg-secondary text-white border-0" required placeholder="Ej: 11 2345 6789">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bloque 2: Método de Envío --}}
                    <div class="card bg-dark border-secondary shadow mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-warning mb-3"><i class="bi bi-truck me-2"></i> Método de Entrega</h5>

                            <div class="d-flex flex-column gap-3">
                                <label class="p-3 bg-secondary rounded border border-warning d-flex align-items-center cursor-pointer justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="radio" name="metodo_envio" value="retiro" class="form-check-input text-warning" checked onclick="toggleEnvio(false)">
                                        <div>
                                            <span class="d-block fw-bold text-white">Retiro por Local</span>
                                            <small class="text-light opacity-75">Pasás a buscarlo listo por nuestra sucursal</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-warning text-dark fw-bold">Gratis</span>
                                </label>

                                <label class="p-3 bg-secondary rounded border border-secondary d-flex align-items-center cursor-pointer justify-content-between" id="label-delivery">
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="radio" name="metodo_envio" value="delivery" class="form-check-input text-warning" onclick="toggleEnvio(true)">
                                        <div>
                                            <span class="d-block fw-bold text-white">Envío a Domicilio (Solo Corrientes Capital)</span>
                                            <small class="text-light opacity-75">Te lo llevamos directo a tu casa</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-light text-dark fw-bold">A coordinar</span>
                                </label>
                            </div>

                            {{-- Campos Dinámicos de Dirección (Se muestran solo si elige Delivery) --}}
                            <div id="campos-direccion" class="mt-4 d-none">
                                <h6 class="text-warning small fw-bold mb-3">Dirección de Entrega</h6>
                                <div class="row g-3">
                                    <div class="col-12 col-md-8">
                                        <label class="form-label text-secondary small fw-bold">Calle y Número</label>
                                        <input type="text" id="input-calle" class="form-control bg-secondary text-white border-0" placeholder="Ej: Av. Rivadavia 1234">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label class="form-label text-secondary small fw-bold">Piso / Depto (Opcional)</label>
                                        <input type="text" class="form-control bg-secondary text-white border-0" placeholder="Ej: 4to B">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bloque 3: Método de Pago --}}
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
                                            <small class="text-light opacity-75">Te enviaremos los datos CBU</small>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- COLUMNA DERECHA: RESUMEN DE COMPRA --}}
                <div class="col-12 col-lg-4">
                    <div class="card text-bg-dark border-warning shadow position-sticky" style="top: 20px;">
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold text-warning mb-4 pb-2 border-bottom border-secondary">Resumen de Compra</h4>

                            {{-- Mini Lista de Productos elegidos --}}
                            <div class="mb-4 style-scroll" style="max-height: 200px; overflow-y: auto;">
                                @php $total = 0; @endphp
                                @foreach($carrito as $item)
                                @php
                                $subtotal = $item->producto->precio * $item->cantidad;
                                $total += $subtotal;
                                @endphp
                                <div class="d-flex justify-content-between align-items-center mb-3 pe-2">
                                    <div>
                                        <span class="fw-bold text-light d-block small">{{ $item->producto->nombre }}</span>
                                        <small class="text-secondary">{{ $item->cantidad }} kg x ${{ number_format($item->producto->precio, 0, ',', '.') }}</small>
                                    </div>
                                    <span class="fw-bold text-warning small">$ {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-between mb-4 fs-4 border-top border-secondary pt-3">
                                <span class="fw-bold text-warning">Total:</span>
                                <span class="fw-bold text-warning">$ {{ number_format($total, 0, ',', '.') }}</span>
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

    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Script interactivo para cambiar dinámicamente bordes y mostrar el formulario de dirección --}}
    <script>
        function toggleEnvio(isDelivery) {
            const camposDireccion = document.getElementById('campos-direccion');
            const inputCalle = document.getElementById('input-calle');
            const labels = document.querySelectorAll('input[name="metodo_envio"]');

            // Actualizar clases de bordes visuales en los contenedores
            labels.forEach(radio => {
                const parentLabel = radio.closest('label');
                if (radio.checked) {
                    parentLabel.classList.remove('border-secondary');
                    parentLabel.classList.add('border-warning');
                } else {
                    parentLabel.classList.remove('border-warning');
                    parentLabel.classList.add('border-secondary');
                }
            });

            // Mostrar u ocultar sección de dirección física
            if (isDelivery) {
                camposDireccion.classList.remove('d-none');
                inputCalle.setAttribute('required', 'required');
            } else {
                camposDireccion.classList.add('d-none');
                inputCalle.removeAttribute('required');
                inputCalle.value = '';
            }
        }

        document.querySelectorAll('input[name="metodo_pago"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="metodo_pago"]').forEach(r => {
                    r.closest('label').classList.remove('border-warning');
                    r.closest('label').classList.add('border-secondary');
                });
                if (this.checked) {
                    this.closest('label').classList.remove('border-secondary');
                    this.closest('label').classList.add('border-warning');
                }
            });
        });
    </script>

    <style>
        .form-control::placeholder {
            color: #adb5bd !important;
            opacity: 0.6;
        }

        .cursor-pointer {
            cursor: pointer;
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
</body>

</html>