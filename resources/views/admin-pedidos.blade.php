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

    <style>
        .sidebar-menu .nav-link {
            color: #fff;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s ease;
            display: block;
        }

        .sidebar-menu .nav-link:hover {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .sidebar-menu .nav-link.active {
            background-color: #ffc107 !important;
            color: #212529 !important;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container-fluid px-4 mt-5 mb-5">
        <div class="row">

            <div class="col-md-3 col-lg-2 mb-4">
                <div class="card bg-dark border-secondary p-3 shadow">
                    <h5 class="fw-bold text-warning mb-3 text-center text-md-start">
                        <i class="bi bi-speedometer2 me-2"></i>Panel Admin
                    </h5>
                    <hr class="border-secondary mt-0">
                    <div class="nav flex-column nav-pills sidebar-menu">
                        <a href="{{ route('admin.index') }}" class="nav-link text-start border-0 text-decoration-none">
                            <i class="bi bi-house-door-fill me-2"></i> Inicio
                        </a>
                        <a href="{{ route('admin.productos') }}" class="nav-link text-start border-0 text-decoration-none">
                            <i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos
                        </a>
                        <a href="{{ route('admin.pedidos') }}" class="nav-link active text-start border-0 text-decoration-none">
                            <i class="bi bi-bag-check-fill me-2"></i> Gestión de Pedidos
                        </a>
                        <a href="{{ route('admin.consultas') }}" class="nav-link text-start border-0 position-relative text-decoration-none">
                            <i class="bi bi-envelope-fill me-2"></i> Gestión de Consultas
                            @php $mensajesNuevos = $consultas->where('estado', 0)->count(); @endphp
                            @if($mensajesNuevos > 0)
                            <span class="position-absolute top-50 end-0 translate-middle-y me-3 badge rounded-pill bg-danger">
                                {{ $mensajesNuevos }}
                            </span>
                            @endif
                        </a>
                        <a href="{{ route('admin.usuarios') }}" class="nav-link text-start border-0 {{ request()->routeIs('admin.usuarios') ? 'active' : '' }}">
                            <i class="bi bi-people-fill me-2"></i> Gestión de Usuarios
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-warning m-0"><i class="bi bi-bag-check-fill me-2"></i> Gestión de Pedidos</h2>
                </div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0 shadow mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show bg-danger text-white border-0 shadow mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card bg-dark border-secondary shadow mb-5">
                    <div class="card-header border-secondary bg-secondary text-white fw-bold">
                        <span>Listado de Órdenes Actuales</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-warning">
                                    <th class="ps-3">N° Orden</th>
                                    <th>Fecha y Hora</th>
                                    <th>Usuario</th>
                                    <th>Entrega</th>
                                    <th>Forma de Pago</th>
                                    <th>Productos</th>
                                    <th>Total</th>
                                    <th class="pe-3">Acción (Estado)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pedidos as $pedido)
                                <tr>
                                    <td class="ps-3 fw-bold">#{{ $pedido->id }}</td>

                                    <td class="text-white-50 small">
                                        <i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y') }}<br>
                                        <i class="bi bi-clock me-1"></i> {{ \Carbon\Carbon::parse($pedido->created_at)->format('H:i') }} hs
                                    </td>

                                    <td>
                                        <i class="bi bi-person-circle me-1 text-secondary"></i>
                                        {{ $pedido->user->name ?? 'Usuario Desconocido' }}
                                    </td>

                                    <td>
                                        @if(isset($pedido->metodo_envio) && $pedido->metodo_envio === 'delivery')
                                        <span class="badge bg-info text-dark mb-1"><i class="bi bi-truck me-1"></i>A Domicilio</span><br>
                                        <small class="text-light" style="font-size: 0.8rem;"><i class="bi bi-geo-alt-fill text-warning me-1"></i>{{ $pedido->direccion_envio ?? 'Dirección no especificada' }}</small>
                                        @elseif(isset($pedido->metodo_envio) && $pedido->metodo_envio === 'retiro')
                                        <span class="badge bg-secondary"><i class="bi bi-shop me-1"></i>Retiro en Local</span>
                                        @else
                                        <span class="badge bg-dark border border-secondary text-secondary">Dato no registrado</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($pedido->forma_pago))
                                        <span class="badge bg-primary text-white"><i class="bi bi-credit-card-fill me-1"></i>{{ ucfirst($pedido->forma_pago) }}</span>
                                        @else
                                        <span class="badge bg-dark border border-secondary text-secondary">No especificada</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($pedido->detalles) && count($pedido->detalles) > 0)
                                        <ul class="mb-0 ps-3 small text-light" style="list-style-type: circle;">
                                            @foreach($pedido->detalles as $detalle)
                                            <li>{{ $detalle->cantidad }}x {{ $detalle->nombre ?? 'Producto Eliminado' }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <small class="text-white fst-italic">Detalles no cargados</small>
                                        @endif
                                    </td>

                                    <td class="text-success fw-bold text-nowrap">$ {{ number_format($pedido->total, 0, ',', '.') }}</td>

                                    <td class="pe-3">
                                        <form action="{{ route('admin.pedidos.actualizar', $pedido->id) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('PUT')

                                            <select name="estado" class="form-select form-select-sm bg-dark text-white border-warning" onchange="this.form.submit()" required>
                                                <option value="Sin confirmar" {{ $pedido->estado == 'Sin confirmar' ? 'selected' : '' }}>Sin confirmar</option>
                                                <option value="En proceso" {{ $pedido->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                                                <option value="Listo para enviar/retirar" {{ $pedido->estado == 'Listo para enviar/retirar' ? 'selected' : '' }}>Listo para enviar/retirar</option>
                                                <option value="Enviado" {{ $pedido->estado == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                                <option value="Entregado/retirado" {{ $pedido->estado == 'Entregado/retirado' ? 'selected' : '' }}>Entregado/retirado</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-secondary">
                                        <i class="bi bi-bag-x fs-1 d-block mb-2"></i> No hay pedidos registrados en el sistema.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>