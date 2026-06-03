<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Gestión de Consultas</title>

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
                        <a href="{{ route('admin.consultas') }}" class="nav-link active text-start border-0 position-relative text-decoration-none">
                            <i class="bi bi-envelope-fill me-2"></i> Gestión de Consultas
                            @if($consultas->count() > 0)
                            <span class="position-absolute top-50 end-0 translate-middle-y me-3 badge rounded-pill bg-danger">
                                {{ $consultas->count() }}
                            </span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <h2 class="fw-bold text-warning mb-4"><i class="bi bi-envelope-fill me-2"></i> Bandeja de Consultas</h2>

                <div class="card bg-dark border-secondary shadow mx-auto">
                    <div class="card-header border-secondary bg-secondary text-white fw-bold d-flex justify-content-between align-items-center">
                        <span>Mensajes de Usuarios</span>
                        <span class="badge bg-warning text-dark">{{ $consultas->count() }} totales</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-warning">
                                    <th class="ps-3">Remitente</th>
                                    <th>Asunto</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultas as $c)
                                <tr class="{{ $c->estado ? 'opacity-50' : '' }}">
                                    <td class="ps-3">
                                        @if($c->users_id)
                                        <span class="badge bg-primary mb-1">
                                            <i class="bi bi-person-check-fill"></i> Registrado
                                        </span>
                                        <div class="fw-bold">{{ $c->user->name }}</div>
                                        @else
                                        <span class="badge bg-secondary mb-1">
                                            <i class="bi bi-person-x-fill"></i> Invitado
                                        </span>
                                        <div class="fw-bold">{{ $c->nombre }}</div>
                                        @endif
                                        <small class="text-white-50 d-block">{{ $c->email }}</small>
                                    </td>

                                    <td>{{ $c->asunto }}</td>
                                    <td>{{ Str::limit($c->mensaje, 50) }}</td>
                                    <td class="text-white-50">{{ $c->created_at->format('d/m/Y') }}</td>

                                    <td class="text-center" style="min-width: 250px;">
                                        <form action="{{ route('consultas.responder', $c->id) }}" method="POST">
                                            @csrf
                                            <textarea name="respuesta" class="form-control bg-secondary text-white border-0 mb-2"
                                                rows="2" placeholder="Escribe tu respuesta aquí...">{{ $c->respuesta }}</textarea>

                                            <div class="d-flex justify-content-between">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-send"></i> Enviar
                                                </button>

                                                <button formaction="{{ route('consultas.marcarLeido', $c->id) }}" type="submit"
                                                    class="btn btn-sm {{ $c->estado ? 'btn-success' : 'btn-warning' }}">
                                                    <i class="bi {{ $c->estado ? 'bi-check-all' : 'bi-clock' }}"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <form action="{{ route('consultas.eliminar', $c->id) }}" method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar esta consulta?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mt-2 w-100">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-secondary">No hay consultas.</td>
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