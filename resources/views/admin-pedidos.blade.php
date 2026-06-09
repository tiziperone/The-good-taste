<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Gestión de Pedidos</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
        @include('componentes.botonesAtrasAdelante')

        <a href="{{ route('admin.index') }}" class="btn btn-outline-warning fw-bold">
            <i class="bi bi-house-door-fill me-2"></i>Volver al Panel
        </a>
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container-fluid px-4 mt-5 mb-5">
        <h2 class="text-warning fw-bold mb-4">
            <i class="bi bi-bag-check-fill me-2"></i>Gestión de Pedidos
        </h2>

        {{-- Alertas de Éxito o Error --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show fw-bold" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show fw-bold" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Tabla de Pedidos --}}
        <div class="card bg-dark border-secondary shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle border-warning m-0">
                        <thead class="table-warning text-dark text-center">
                            <tr>
                                <th>N° Pedido</th>
                                <th>Usuario</th>
                                <th>Método de Pago</th>
                                <th>Tipo de Entrega</th>
                                <th>Estado Actual</th>
                                <th>Cambiar Estado</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($pedidos as $pedido)
                            <tr>
                                <td class="fw-bold">#{{ $pedido->id }}</td>
                                <td>{{ $pedido->user->name ?? 'Usuario Desconocido' }}</td>

                                {{-- NOTA: Si tus columnas se llaman distinto en la BD, cámbialo aquí abajo --}}
                                <td>{{ $pedido->metodo_pago }}</td>
                                <td>{{ $pedido->tipo_envio }}</td>

                                <td>
                                    <span class="badge fs-6
                                            @if($pedido->estado == 'En espera') bg-secondary 
                                            @elseif($pedido->estado == 'Listo') bg-primary 
                                            @elseif($pedido->estado == 'En camino') bg-info text-dark
                                            @elseif($pedido->estado == 'Entregado' || $pedido->estado == 'Listo para retirar') bg-success 
                                            @else bg-light text-dark @endif">
                                        {{ $pedido->estado }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.pedidos.actualizar', $pedido->id) }}" method="POST" class="d-flex gap-2 justify-content-center">
                                        @csrf
                                        @method('PUT')

                                        <select name="estado" class="form-select form-select-sm bg-dark text-white border-warning" style="width: auto;" required>
                                            <option value="En espera" {{ $pedido->estado == 'En espera' ? 'selected' : '' }}>En espera</option>
                                            <option value="Listo" {{ $pedido->estado == 'Listo' ? 'selected' : '' }}>Listo</option>

                                            {{-- Lógica inteligente: Solo muestra opciones de envío si es a domicilio, o retiro si es en local --}}
                                            @if(strtolower($pedido->tipo_envio) == 'domicilio' || strtolower($pedido->tipo_envio) == 'envio')
                                            <option value="En camino" {{ $pedido->estado == 'En camino' ? 'selected' : '' }}>En camino</option>
                                            <option value="Entregado" {{ $pedido->estado == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                                            @else
                                            <option value="Listo para retirar" {{ $pedido->estado == 'Listo para retirar' ? 'selected' : '' }}>Listo para retirar</option>
                                            @endif
                                        </select>

                                        <button type="submit" class="btn btn-warning btn-sm fw-bold">Actualizar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-white-50 py-4">
                                    <i class="bi bi-inbox-fill fs-2 d-block mb-2"></i>
                                    No hay pedidos registrados en el sistema.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>