<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image/png">
    <title>The Good Taste - Gestión de Usuarios</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZcgoEq3ZZ1OOFf/X9g5N0M6uF32TijFw1QvQ8FkL/z1OBO6X3/1FhT/41z4f6x" defer></script>

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
            <!-- Sidebar Navigation -->
            <div class="col-md-3 col-lg-2 mb-4">
                <div class="card bg-dark border-secondary p-3 shadow">
                    <h5 class="fw-bold text-warning mb-3 text-center text-md-start">
                        <i class="bi bi-speedometer2 me-2"></i>Panel Admin
                    </h5>
                    <hr class="border-secondary mt-0">
                    <div class="nav flex-column nav-pills sidebar-menu">
                        <a href="{{ route('admin.index') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-house-door-fill me-2"></i> Inicio</a>
                        <a href="{{ route('admin.productos') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos</a>
                        <a href="{{ route('admin.pedidos') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-bag-check-fill me-2"></i> Gestión de Pedidos</a>
                        <a href="{{ route('admin.consultas') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-envelope-fill me-2"></i> Gestión de Consultas</a>
                        <a href="{{ route('admin.usuarios') }}" class="nav-link active text-start border-0"><i class="bi bi-people-fill me-2"></i> Gestión de Usuarios</a>
                    </div>
                </div>
            </div>

            <!-- Tablas de Usuarios -->
            <div class="col-md-9 col-lg-10">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- TABLA ADMINISTRADORES -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold text-warning m-0"><i class="bi bi-shield-lock-fill me-2"></i> Administradores</h2>
                </div>

                <div class="card bg-dark border-secondary shadow mb-5">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-warning border-secondary">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($administradores as $admin)
                                <tr class="border-secondary">
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @if($admin->activo)
                                        <span class="badge bg-success">Activo</span>
                                        @else
                                        <span class="badge bg-danger">Baneado</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($admin->id !== Auth::id())
                                        <form action="{{ route('admin.usuarios.quitarAdmin', $admin->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-warning" title="Quitar rol de admin">
                                                <i class="bi bi-person-dash"></i> Quitar Admin
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.usuarios.banear', $admin->id) }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $admin->activo ? 'btn-outline-danger' : 'btn-outline-success' }}">
                                                {{ $admin->activo ? 'Suspender' : 'Reactivar' }}
                                            </button>
                                        </form>
                                        @else
                                        <span class="text-muted small">Tu sesión actual</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">No hay administradores registrados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TABLA USUARIOS CLIENTES -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold text-warning m-0"><i class="bi bi-people-fill me-2"></i> Usuarios Clientes</h2>
                </div>

                <div class="card bg-dark border-secondary shadow">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-warning border-secondary">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($usuarios as $user)
                                <tr class="border-secondary">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->activo)
                                        <span class="badge bg-success">Activo</span>
                                        @else
                                        <span class="badge bg-danger">Baneado</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.usuarios.hacerAdmin', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-warning" title="Hacer administrador">
                                                <i class="bi bi-shield-plus"></i> Hacer Admin
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.usuarios.banear', $user->id) }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $user->activo ? 'btn-outline-danger' : 'btn-outline-success' }}">
                                                {{ $user->activo ? 'Suspender' : 'Reactivar' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">No hay usuarios clientes registrados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>