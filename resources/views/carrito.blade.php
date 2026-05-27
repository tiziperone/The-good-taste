<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Carrito</title>

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
        <h2 class="fw-bold text-warning mb-4" style="font-family: 'Montserrat', sans-serif;">🛒 Tu Carrito de Compras</h2>

        {{-- Mensajes de Error o Éxito del Servidor --}}
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-start border-danger border-5 bg-dark text-white shadow mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-start border-success border-5 bg-dark text-white shadow mb-4" role="alert">
            <i class="bi bi-check-circle-fill text-success me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(isset($carrito) && $carrito->count() > 0)
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="card bg-dark border-secondary shadow">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead class="table-light text-dark fw-bold">
                                <tr>
                                    <th scope="col" class="ps-3">Producto</th>
                                    <th scope="col" class="text-center">Precio</th>
                                    <th scope="col" class="text-center">Cantidad (1kg = 1 unidad)</th>
                                    <th scope="col" class="text-center">Subtotal</th>
                                    <th scope="col" class="text-center pe-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                $carritoInvalido = false;
                                @endphp

                                @foreach($carrito as $item)
                                @php
                                // Verificamos si el producto existe Y su borrado lógico indica que está activo
                                // REEMPLAZAR 'estado' por tu columna real (ej: 'activo')
                                $productoValido = $item->producto && $item->producto->estado == 1;

                                if (!$productoValido) {
                                $carritoInvalido = true;
                                } else {
                                $subtotal = $item->producto->precio * $item->cantidad;
                                $total += $subtotal;
                                }
                                @endphp

                                @if($productoValido)
                                {{-- Fila normal: El producto EXISTE Y ESTÁ ACTIVO --}}
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ asset($item->producto->url_imagen ?? 'Img/BondiolaTarjetaSinPimenton.png') }}" alt="{{ $item->producto->nombre }}" class="rounded shadow-sm" style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #ffc107;">
                                            <span class="fw-bold text-light">{{ $item->producto->nombre }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">$ {{ number_format($item->producto->precio, 0, ',', '.') }}</td>

                                    <td class="text-center">
                                        <div class="d-inline-flex align-items-center bg-secondary rounded overflow-hidden shadow-sm" style="border: 1px solid #6c757d;">
                                            <button type="button" class="btn btn-sm btn-dark border-0 px-2 btn-actualizar" data-id="{{ $item->id }}" data-accion="decrementar">
                                                <i class="bi bi-minus-lg text-warning"></i>
                                            </button>

                                            <span class="px-3 fw-bold text-white cantidad-val" data-id="{{ $item->id }}">
                                                {{ $item->cantidad }} kg
                                            </span>

                                            <button type="button" class="btn btn-sm btn-dark border-0 px-2 btn-actualizar" data-id="{{ $item->id }}" data-accion="incrementar">
                                                <i class="bi bi-plus-lg text-warning"></i>
                                            </button>
                                        </div>
                                    </td>

                                    <td class="text-center fw-bold text-warning subtotal-val" data-id="{{ $item->id }}">$ {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    <td class="text-center pe-3">
                                        <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST" onsubmit="return confirm('¿Querés quitar este producto del carrito?');">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Eliminar ítem">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @else
                                {{-- Fila de Alerta: El producto NO EXISTE o FUE ELIMINADO LÓGICAMENTE --}}
                                <tr class="table-danger text-dark fw-bold">
                                    <td class="ps-3" colspan="4">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                                            <span>Este producto ya no se encuentra disponible. Por favor, eliminalo para continuar con la compra.</span>
                                        </div>
                                    </td>
                                    <td class="text-center pe-3">
                                        <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3" title="Quitar ítem obsoleto">
                                                <i class="bi bi-trash-fill me-1"></i> Quitar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ session('url_seguir_comprando', url('/')) }}" class="btn btn-outline-light fw-bold">
                        <i class="bi bi-arrow-left me-2"></i> Seguir Comprando
                    </a>
                    <form action="{{ route('carrito.vaciar') }}" method="POST" onsubmit="return confirm('¿Seguro querés vaciar todo el carrito?');">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-sm">Vaciar Carrito</button>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card text-bg-dark border-warning shadow h-100">
                    <div class="card-body d-flex flex-column p-4">
                        <h4 class="card-title fw-bold text-warning mb-4 pb-2 border-bottom border-secondary">Resumen del Pedido</h4>

                        <div class="d-flex justify-content-between mb-3 fs-5">
                            <span class="text-secondary">Productos:</span>
                            <span class="fw-bold text-light">{{ $carrito->count() }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-4 fs-4 border-top border-secondary pt-3">
                            <span class="fw-bold text-warning">Total:</span>
                            <span class="fw-bold text-warning total-general-val">$ {{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        <div class="mt-auto">
                            @if($carritoInvalido)
                            <button type="button" class="btn btn-secondary btn-lg w-100 fw-bold text-white shadow mb-2" disabled>
                                Compra Bloqueada <i class="bi bi-lock-fill ms-2"></i>
                            </button>
                            <small class="text-danger d-block text-center fw-bold">Hay ítems no disponibles en tu lista.</small>
                            @else
                            <a href="{{ route('compra.index') }}" class="btn btn-warning btn-lg w-100 fw-bold text-dark shadow">
                                Finalizar Compra <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="card text-bg-dark border-secondary p-5 text-center shadow-lg my-5" style="border-radius: 15px;">
            <div class="mb-4">
                <i class="bi bi-cart-x text-warning" style="font-size: 4rem;"></i>
            </div>
            <h3 class="fw-bold text-light mb-3">Tu carrito está vacío</h3>
            <p class="text-secondary mb-4 mx-auto" style="max-width: 500px;">
                ¡Todavía no agregaste ninguna de nuestras bondiolas caseras, milanesas o pastas artesanales! Date un gusto visitando nuestro catálogo.
            </p>
            <div>
                <a href="{{ session('url_seguir_comprando', url('/')) }}" class="btn btn-warning fw-bold text-dark px-4 py-2 shadow">
                    Volver al Catálogo
                </a>
            </div>
        </div>
        @endif
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-actualizar').forEach(boton => {
                boton.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const accion = this.getAttribute('data-accion');

                    fetch("{{ route('carrito.actualizar') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                id: id,
                                accion: accion
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.querySelector(`.cantidad-val[data-id="${id}"]`).innerText = `${data.cantidad} kg`;
                                document.querySelector(`.subtotal-val[data-id="${id}"]`).innerText = data.subtotal;
                                document.querySelector('.total-general-val').innerText = data.totalGeneral;
                            } else {
                                alert(`⚠️ ${data.message}`);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('❌ Hubo un error al procesar el cambio de cantidad.');
                        });
                });
            });
        });
    </script>
</body>

</html>