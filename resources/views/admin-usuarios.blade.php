@extends('layouts.app')

@section('titulo', 'The Good Taste - Gestión de Usuarios')

@section('estilos')
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
@endsection

@section('contenido')
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
                    <a href="{{ route('admin.index') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-house-door-fill me-2"></i> Inicio</a>
                    <a href="{{ route('admin.productos') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos</a>
                    <a href="{{ route('admin.pedidos') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-bag-check-fill me-2"></i> Gestión de Pedidos</a>
                    <a href="{{ route('admin.consultas') }}" class="nav-link text-start border-0 text-decoration-none"><i class="bi bi-envelope-fill me-2"></i> Gestión de Consultas</a>
                    <a href="{{ route('admin.usuarios') }}" class="nav-link active text-start border-0"><i class="bi bi-people-fill me-2"></i> Gestión de Usuarios</a>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-lg-10">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-warning m-0"><i class="bi bi-shield-lock-fill me-2"></i> Personal (Admins y Gerentes)</h2>
            </div>
            <div class="card bg-dark border-secondary shadow mb-5">
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead>
                            <tr class="text-warning border-secondary">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
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
                                    @if($admin->role === 'gerente') <span class="badge bg-info text-dark">Gerente</span>
                                    @else <span class="badge bg-warning text-dark">Admin</span> @endif
                                </td>
                                <td>
                                    @if($admin->activo) <span class="badge bg-success">Activo</span>
                                    @else <span class="badge bg-danger">Baneado</span> @endif
                                </td>
                                <td class="text-center">
                                    @if($admin->id !== Auth::id())
                                    <form action="{{ route('admin.usuarios.quitarAdmin', $admin->id) }}" method="POST" class="d-inline">
                                        @csrf <button type="submit" class="btn btn-sm btn-outline-warning"><i class="bi bi-person-dash"></i> Quitar Privilegios</button>
                                    </form>
                                    <form action="{{ route('admin.usuarios.banear', $admin->id) }}" method="POST" class="d-inline ms-1">
                                        @csrf <button type="submit" class="btn btn-sm {{ $admin->activo ? 'btn-outline-danger' : 'btn-outline-success' }}">{{ $admin->activo ? 'Suspender' : 'Reactivar' }}</button>
                                    </form>
                                    @else
                                    <span class="text-muted small">Tu sesión actual</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">No hay personal registrado.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

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
                                    @if($user->activo) <span class="badge bg-success">Activo</span>
                                    @else <span class="badge bg-danger">Baneado</span> @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.usuarios.hacerAdmin', $user->id) }}" method="POST" class="d-inline">
                                        @csrf <button type="submit" class="btn btn-sm btn-outline-warning"><i class="bi bi-shield-plus"></i> Hacer Admin</button>
                                    </form>
                                    <form action="{{ route('admin.usuarios.hacerGerente', $user->id) }}" method="POST" class="d-inline ms-1">
                                        @csrf <button type="submit" class="btn btn-sm btn-outline-info"><i class="bi bi-person-up"></i> Hacer Gerente</button>
                                    </form>
                                    <form action="{{ route('admin.usuarios.banear', $user->id) }}" method="POST" class="d-inline ms-1">
                                        @csrf <button type="submit" class="btn btn-sm {{ $user->activo ? 'btn-outline-danger' : 'btn-outline-success' }}">{{ $user->activo ? 'Suspender' : 'Reactivar' }}</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">No hay usuarios clientes.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($usuarios->hasPages())
                <div class="card-footer border-secondary bg-dark d-flex justify-content-center pt-3 pb-3">
                    {{ $usuarios->links('pagination::bootstrap-5') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection