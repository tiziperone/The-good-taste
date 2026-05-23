<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Carrito</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">
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

        @if(session('carrito') && count(session('carrito')) > 0)
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="card bg-dark border-secondary shadow">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead class="table-light text-dark fw-bold">
                                <tr>
                                    <th scope="col" class="ps-3">Producto</th>
                                    <th scope="col" class="text-center">Precio</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                    <th scope="col" class="text-center">Subtotal</th>
                                    <th scope="col" class="text-center pe-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach(session('carrito') as $id => $detalles)
                                @php
                                $subtotal = $detalles['precio'] * $detalles['cantidad'];
                                $total += $subtotal;
                                @endphp
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ asset($detalles['imagen']) }}" alt="{{ $detalles['nombre'] }}" class="rounded shadow-sm" style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #ffc107;">
                                            <span class="fw-bold text-light">{{ $detalles['nombre'] }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">$ {{ number_format($detalles['precio'], 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary px-3 py-2 fs-6">{{ $detalles['cantidad'] }} kg</span>
                                    </td>
                                    <td class="text-center fw-bold text-warning">$ {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    <td class="text-center pe-3">
                                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST" onsubmit="return confirm('¿Querés quitar este producto del carrito?');">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Eliminar ítem">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ url('/') }}" class="btn btn-outline-light fw-bold">
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
                            <span class="fw-bold text-light">{{ count(session('carrito')) }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-4 fs-4 border-top border-secondary pt-3">
                            <span class="fw-bold text-warning">Total:</span>
                            <span class="fw-bold text-warning">$ {{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        <div class="alert alert-dark border-secondary text-light small mb-4" role="alert">
                            <i class="bi bi-info-circle-fill text-warning me-2"></i> Los pedidos de fiambres y pastas artesanales se retiran o coordinan según stock.
                        </div>

                        <div class="mt-auto">
                            <a href="{{ url('/compra') }}" class="btn btn-warning btn-lg w-100 fw-bold text-dark shadow">
                                Finalizar Compra <i class="bi bi-arrow-right ms-2"></i>
                            </a>
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
                <a href="{{ url('/') }}" class="btn btn-warning fw-bold text-dark px-4 py-2 shadow">
                    Ver Menú de Productos
                </a>
            </div>
        </div>
        @endif
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>