<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Consultas</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <!-- Navegación Atras/Adelante -->
    <div class="container mt-4 mb-4 d-flex justify-content-between align-items-center">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container mt-5 mb-5">
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultas as $c)
                        <tr>
                            <td class="ps-3 fw-bold">
                                {{ $c->user ? $c->user->name : $c->nombre }}
                                <br>
                                <small class="text-white-50 fw-normal">{{ $c->email }}</small>
                            </td>
                            <td>{{ $c->asunto }}</td>
                            <td>{{ Str::limit($c->mensaje, 50) }}</td>
                            <td class="text-white-50">{{ $c->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-secondary">No hay consultas pendientes.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>