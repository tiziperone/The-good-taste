<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container-fluid px-4 mt-5 mb-5">
        <div class="row">
            <div class="col-md-9 col-lg-10 mx-auto">
                <h2 class="fw-bold text-warning mb-4"><i class="bi bi-people-fill me-2"></i> Gestión de Usuarios</h2>

                <div class="card bg-dark border-secondary shadow">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead>
                            <tr class="text-warning">
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <span class="badge {{ $u->activo ? 'bg-success' : 'bg-danger' }}">
                                        {{ $u->activo ? 'Activo' : 'Baneado' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.usuarios.banear', $u->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $u->activo ? 'btn-danger' : 'btn-success' }}">
                                            {{ $u->activo ? 'Banear' : 'Activar' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>