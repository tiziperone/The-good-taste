<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ secure_asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Gestión de Usuarios</title>

    <link href="{{ secure_asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('css/estilos.css') }}">

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
                        <a href="{{ route('admin.pedidos') }}" class="nav-link text-start border-0 text-decoration-none">
                            <i class="bi bi-bag-check-fill me-2"></i> Gestión de Pedidos
                        </a>
                        <a href="{{ route('admin.consultas') }}" class="nav-link text-start border-0 text-decoration-none">
                            <i class="bi bi-envelope-fill me-2"></i> Gestión de Consultas
                        </a>
                        <a href="{{ route('admin.usuarios') }}" class="nav-link active text-start border-0">
                            <i class="bi bi-people-fill me-2"></i> Gestión de Usuarios
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-warning m-0"><i class="bi bi-shield-lock-fill me-2"></i> Administradores</h2>
                </div>

                <div class="card bg-dark border-secondary shadow mb-5">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover align-middle mb-0">
                                <thead>
                                    <tr class="text-warning">
                                        <th class="ps-3">ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($administradores as $admin)
                                    <tr>
                                        <td class="ps-3">{{ $admin->id }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            @if($admin->last_seen_at && \Carbon\Carbon::parse($admin->last_seen_at)->diffInMinutes(now()) < 5)
                                                <span class="badge bg-success">En sesión</span>
                                                @else
                                                <small class="text-white">
                                                    Última vez: {{ $admin->last_seen_at ? \Carbon\Carbon::parse($admin->last_seen_at)->format('d/m/Y H:i') : 'Desconocido' }}
                                                </small>
                                                @endif
                                        </td>
                                        <td class="text-center">
                                            @if(auth()->id() !== $admin->id)
                                            <form action="{{ route('admin.usuarios.quitarAdmin', $admin->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Quitar permisos de administrador">
                                                    <i class="bi bi-arrow-down-circle-fill me-1"></i> Quitar Admin
                                                </button>
                                            </form>
                                            @else
                                            <span class="badge bg-secondary">Tú (Actual)</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No hay otros administradores registrados.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 mt-5">
                    <h2 class="fw-bold text-warning m-0"><i class="bi bi-person-lines-fill me-2"></i> Usuarios Regulares</h2>
                </div>

                <div class="card bg-dark border-secondary shadow mb-5">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover align-middle mb-0">
                                <thead>
                                    <tr class="text-warning">
                                        <th class="ps-3">ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($usuarios as $user)
                                    <tr>
                                        <td class="ps-3">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->last_seen_at && \Carbon\Carbon::parse($user->last_seen_at)->diffInMinutes(now()) < 5)
                                                <span class="badge bg-success">En sesión</span>
                                                @else
                                                <small class="text-white">
                                                    Última vez: {{ $user->last_seen_at ? \Carbon\Carbon::parse($user->last_seen_at)->format('d/m/Y H:i') : 'Desconocido' }}
                                                </small>
                                                @endif
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.usuarios.hacerAdmin', $user->id) }}" method="POST" class="d-inline me-1">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-info btn-sm" title="Convertir en Administrador">
                                                    <i class="bi bi-arrow-up-circle-fill me-1"></i> Hacer Admin
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.usuarios.banear', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @if($user->activo)
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Banear Usuario">
                                                    <i class="bi bi-person-x-fill me-1"></i> Banear
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-outline-success btn-sm" title="Reactivar Usuario">
                                                    <i class="bi bi-person-check-fill me-1"></i> Reactivar
                                                </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No hay usuarios regulares registrados.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ secure_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>