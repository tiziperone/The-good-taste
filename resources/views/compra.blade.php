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
            appearance: none;
            /* Soluciona la advertencia */
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
            appearance: textfield;
            /* Soluciona la advertencia */
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

                    <div class="card bg-dark border-secondary shadow mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-warning mb-3"><i class="bi bi-truck me-2"></i> Método de Entrega</h5>

                            <div class="d-flex flex-column gap-3">
                                <label class="p-3 bg-secondary rounded border border-warning d-flex align-items-center cursor-pointer justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="radio" name="metodo_envio" value="retiro" class="form-check-input text-warning" checked onclick="toggleEnvio(false)">
                                        <div>
                                            <span class="d-block fw-bold text-white">Retiro por Local</span>
                                            <small class="text-light opacity-75">Pasás a buscarlo listo por nuestro local</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-warning text-dark fw-bold">Gratis</span>
                                </label>

                                <label class="p-3 bg-secondary rounded border border-secondary d-flex align-items-center cursor-pointer justify-content-between" id="label-delivery">
                                    <div class="d-flex align-items-center gap-3">
                                        <input type="radio" name="metodo_envio" value="delivery" class="form-check-input text-warning" onclick="toggleEnvio(true)">
                                        <div>
                                            <span class="d-block fw-bold text-white">Envío a Domicilio (De momento, solo Florencia Santa Fe)</span>
                                            <small class="text-light opacity-75">Te lo llevamos directo a tu casa</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-light text-dark fw-bold">A coordinar</span>
                                </label>
                            </div>

                            <div id="campos-direccion" class="mt-4 d-none">
                                <hr class="border-secondary my-4">

                                @if(isset($direccionesGuardadas) && $direccionesGuardadas->count() > 0)
                                <div class="mb-4">
                                    <label class="form-label text-warning small fw-bold">Mis Direcciones Guardadas</label>
                                    <select id="select-direcciones" class="form-select bg-secondary text-white border-0" onchange="cargarDireccionGuardada()">
                                        <option value="">-- Seleccionar una dirección guardada u otra nueva --</option>
                                        @foreach($direccionesGuardadas as $dir)
                                        <option value="{{ $dir->id }}"
                                            data-calle="{{ $dir->calle }}"
                                            data-altura="{{ $dir->altura }}"
                                            data-piso="{{ $dir->piso_depto }}">
                                            {{ $dir->nombre }} ({{ $dir->calle }} {{ $dir->altura }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <h6 class="text-warning small fw-bold mb-3">Dirección de Entrega</h6>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label text-secondary small fw-bold">Calle</label>
                                        <input type="text" id="input-calle" name="calle" class="form-control bg-secondary text-white border-0" placeholder="Ej: 9 de Julio">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label text-secondary small fw-bold">Altura / Número</label>
                                        <input type="text" id="input-altura" name="altura" class="form-control bg-secondary text-white border-0" placeholder="Ej: 1234">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label text-secondary small fw-bold">Piso / Depto (Opcional)</label>
                                        <input type="text" id="input-piso" name="piso_depto" class="form-control bg-secondary text-white border-0" placeholder="Ej: 4to B">
                                    </div>
                                </div>

                                <div class="mt-3 p-3 bg-secondary rounded" id="bloque-guardar-direccion">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="guardar_futura" id="guardar_futura" value="1" onchange="toggleNombreDireccion()">
                                        <label class="form-check-input-label small text-white fw-bold cursor-pointer" for="guardar_futura">
                                            Guardar esta dirección para futuras compras
                                        </label>
                                    </div>
                                    <div id="campo-nombre-alias" class="mt-2 d-none">
                                        <label class="form-label text-warning small fw-bold">Nombre / Alias de la dirección</label>
                                        <input type="text" id="input-nombre-direccion" name="nombre_direccion" class="form-control bg-dark text-white border-0 form-control-sm" placeholder="Ej: Casa Padres, Mi Depto, Trabajo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <div class="modal fade" id="modalExito" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-success shadow-lg" style="border-radius: 15px;">
                <div class="modal-header border-0 pb-0 justify-content-center mt-3">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                </div>
                <div class="modal-body text-center px-4">
                    <h3 class="fw-bold text-success mb-2">¡Pedido Confirmado!</h3>
                    <p class="text-white-50 mb-4">Gracias por tu compra, <span id="resumen-nombre" class="text-white fw-bold"></span>. Acá tenés los detalles de tu pedido:</p>

                    <div class="bg-secondary p-3 rounded text-start mb-4">
                        <div class="mb-2">
                            <span class="text-warning small fw-bold text-uppercase">Método de Entrega</span>
                            <div class="fw-bold" id="resumen-entrega"></div>
                        </div>
                        <div class="mb-3">
                            <span class="text-warning small fw-bold text-uppercase">Método de Pago</span>
                            <div class="fw-bold" id="resumen-pago"></div>
                        </div>
                        <hr class="border-secondary my-2">
                        <div>
                            <span class="text-warning small fw-bold text-uppercase">Tus Productos</span>
                            <div class="mt-2 style-scroll" style="max-height: 120px; overflow-y: auto;" id="contenedor-productos-modal">
                            </div>
                        </div>
                        <hr class="border-secondary my-2">
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="fw-bold text-white fs-5">Total a abonar</span>
                            <span class="fw-bold text-warning fs-5" id="modal-total-compra">$ {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 pb-4 px-4">
                    <div class="d-flex flex-column flex-sm-row gap-2 w-100">
                        <a href="{{ url('/') }}" class="btn btn-outline-warning fw-bold py-2 w-100" style="border-radius: 8px;">
                            <i class="bi bi-house-door-fill me-1"></i> Ir al Inicio
                        </a>
                        <a href="{{ url('/mis-compras') }}" class="btn btn-success fw-bold py-2 w-100" style="border-radius: 8px;">
                            <i class="bi bi-bag-check-fill me-1"></i> Ir a Mis Compras
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('componentes.footer')

    <script>
        function cambiarCantidad(prodId, delta, maxStock, precio) {
            maxStock = parseInt(maxStock);
            precio = parseFloat(precio);

            const inputCant = document.getElementById('cant-' + prodId);
            let cant = parseInt(inputCant.value);
            let nuevaCant = cant + delta;

            if (nuevaCant < 1) nuevaCant = 1;

            if (nuevaCant > maxStock) {
                nuevaCant = maxStock;
                alert('No podés agregar más. El stock máximo disponible es ' + maxStock + '.');
            }

            if (nuevaCant !== cant) {
                inputCant.value = nuevaCant;
                document.getElementById('subtotal-' + prodId).innerText = '$ ' + (nuevaCant * precio).toLocaleString('es-AR');
                actualizarTotal();
            }
        }

        function actualizarTotal() {
            let total = 0;
            document.querySelectorAll('input[id^="cant-"]').forEach(input => {
                let prodId = input.id.replace('cant-', '');
                let subtotalStr = document.getElementById('subtotal-' + prodId).innerText;
                let subtotal = parseInt(subtotalStr.replace('$ ', '').replace(/\./g, ''));
                total += subtotal;
            });

            const totalFormateado = '$ ' + total.toLocaleString('es-AR');
            document.getElementById('total-compra').innerText = totalFormateado;
            document.getElementById('modal-total-compra').innerText = totalFormateado;
        }

        function toggleEnvio(isDelivery) {
            const camposDireccion = document.getElementById('campos-direccion');
            const inputCalle = document.getElementById('input-calle');
            const inputAltura = document.getElementById('input-altura');
            const labels = document.querySelectorAll('input[name="metodo_envio"]');

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

            if (isDelivery) {
                camposDireccion.classList.remove('d-none');
                inputCalle.setAttribute('required', 'required');
                inputAltura.setAttribute('required', 'required');
            } else {
                camposDireccion.classList.add('d-none');
                inputCalle.removeAttribute('required');
                inputAltura.removeAttribute('required');
                inputCalle.value = '';
                inputAltura.value = '';
                document.getElementById('input-piso').value = '';
                const selectDir = document.getElementById('select-direcciones');
                if (selectDir) selectDir.value = '';
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

        function cargarDireccionGuardada() {
            const select = document.getElementById('select-direcciones');
            const selectedOption = select.options[select.selectedIndex];

            const inputCalle = document.getElementById('input-calle');
            const inputAltura = document.getElementById('input-altura');
            const inputPiso = document.getElementById('input-piso');
            const bloqueGuardar = document.getElementById('bloque-guardar-direccion');

            if (selectedOption.value !== "") {
                inputCalle.value = selectedOption.getAttribute('data-calle');
                inputAltura.value = selectedOption.getAttribute('data-altura');
                inputPiso.value = selectedOption.getAttribute('data-piso') || '';

                bloqueGuardar.classList.add('d-none');
                document.getElementById('guardar_futura').checked = false;
                document.getElementById('campo-nombre-alias').classList.add('d-none');
            } else {
                inputCalle.value = '';
                inputAltura.value = '';
                inputPiso.value = '';
                bloqueGuardar.classList.remove('d-none');
            }
        }

        function toggleNombreDireccion() {
            const checkbox = document.getElementById('guardar_futura');
            const campoAlias = document.getElementById('campo-nombre-alias');
            const inputAlias = document.getElementById('input-nombre-direccion');

            if (checkbox.checked) {
                campoAlias.classList.remove('d-none');
                inputAlias.setAttribute('required', 'required');
            } else {
                campoAlias.classList.add('d-none');
                inputAlias.removeAttribute('required');
                inputAlias.value = '';
            }
        }

        function procesarCompra(event) {
            event.preventDefault();

            const botonSubmit = event.target.querySelector('button[type="submit"]');
            botonSubmit.disabled = true;

            const envioElegido = document.querySelector('input[name="metodo_envio"]:checked').value;
            const pagoElegido = document.querySelector('input[name="metodo_pago"]:checked').value;
            const csrfToken = document.querySelector('input[name="_token"]').value;

            document.getElementById('resumen-nombre').textContent = "{{ Auth::user()->name ?? 'Cliente' }}";

            let itemsParaComprar = [];
            document.querySelectorAll('input[id^="cant-"]').forEach(input => {
                let prodId = input.id.replace('cant-', '');
                itemsParaComprar.push({
                    producto_id: prodId,
                    cantidad: parseInt(input.value)
                });
            });

            const contProductosModal = document.getElementById('contenedor-productos-modal');
            contProductosModal.innerHTML = '';
            itemsParaComprar.forEach(item => {
                let row = document.querySelector('#item-row-' + item.producto_id);
                if (row) {
                    let nombre = row.querySelector('.nombre-producto').innerText;
                    let div = document.createElement('div');
                    div.className = 'd-flex justify-content-between align-items-center mb-1';
                    div.innerHTML = `<small class="text-light">${item.cantidad}x ${nombre}</small>`;
                    contProductosModal.appendChild(div);
                }
            });

            let promesas = [];
            let direccionFullFrontend = null;

            if (envioElegido === 'retiro') {
                document.getElementById('resumen-entrega').innerHTML = '<i class="bi bi-shop text-warning me-1"></i> Retiro por sucursal';
            } else {
                const calle = document.getElementById('input-calle').value;
                const altura = document.getElementById('input-altura').value;
                const piso = document.getElementById('input-piso').value;
                const nombreDir = document.getElementById('input-nombre-direccion').value;
                const guardarFuturaCheckbox = document.getElementById('guardar_futura');

                direccionFullFrontend = calle + ' ' + altura;
                if (piso) direccionFullFrontend += ' (' + piso + ')';

                document.getElementById('resumen-entrega').innerHTML = '<i class="bi bi-house-door text-warning me-1"></i> Envío a: ' + direccionFullFrontend;

                if (guardarFuturaCheckbox && guardarFuturaCheckbox.checked && !document.getElementById('bloque-guardar-direccion').classList.contains('d-none')) {
                    let promesaDir = fetch("{{ url('/guardar-direccion') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            calle: calle,
                            altura: altura,
                            piso_depto: piso,
                            nombre_direccion: nombreDir,
                            guardar_futura: 1
                        })
                    }).then(res => res.json());

                    promesas.push(promesaDir);
                }
            }

            if (pagoElegido === 'efectivo') {
                document.getElementById('resumen-pago').innerHTML = '<i class="bi bi-cash-coin text-warning me-1"></i> Efectivo';
            } else {
                document.getElementById('resumen-pago').innerHTML = '<i class="bi bi-bank text-warning me-1"></i> Transferencia / Alias';
            }

            const esCarrito = "{{ request()->has('producto_id') ? 'false' : 'true' }}" === "true";
            const urlParams = new URLSearchParams(window.location.search);
            const productoIdUrl = urlParams.get('producto_id');

            let promesaVaciarCarrito = fetch("{{ url('/confirmar-compra') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    es_carrito: esCarrito,
                    producto_id: productoIdUrl,
                    items: itemsParaComprar,
                    metodo_envio: envioElegido,
                    forma_pago: pagoElegido,
                    metodo_pago: pagoElegido,
                    direccion_envio: direccionFullFrontend
                })
            }).then(res => res.json()).then(data => {
                if (!data.success) {
                    throw new Error(data.message || 'Error desconocido al procesar la compra.');
                }
                return data;
            });

            promesas.push(promesaVaciarCarrito);

            Promise.all(promesas).then(() => {
                botonSubmit.disabled = false;
                const modalExito = new bootstrap.Modal(document.getElementById('modalExito'));
                modalExito.show();
            }).catch(error => {
                botonSubmit.disabled = false;
                console.error('Error procesando compra:', error);
                alert('No se pudo completar el pedido:\n\n' + error.message);
                if (error.message.includes('ya no existe') || error.message.includes('disponible')) {
                    setTimeout(() => window.location.replace("{{ url('/') }}"), 2000);
                }
            });
        }
    </script>
</body>

</html>