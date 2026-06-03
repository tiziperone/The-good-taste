<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Panel de Administración</title>

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
                        <a href="{{ route('admin.index') }}" class="nav-link active text-start border-0 text-decoration-none">
                            <i class="bi bi-house-door-fill me-2"></i> Inicio
                        </a>
                        <a href="{{ route('admin.productos') }}" class="nav-link text-start border-0 text-decoration-none">
                            <i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos
                        </a>
                        <a href="{{ route('admin.consultas') }}" class="nav-link text-start border-0 position-relative text-decoration-none">
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
                <div class="card bg-dark border-warning shadow mx-auto p-5 text-center mt-3" style="border-radius: 15px;">
                    <div class="mb-4">
                        <i class="bi bi-cup-hot-fill text-warning" style="font-size: 4rem;"></i>
                    </div>
                    <h1 class="fw-bold text-warning mb-3">¡Bienvenido al Panel, {{ Auth::user()->name ?? 'Administrador' }}!</h1>
                    <p class="text-white-50 fs-5 mb-5">¿Qué haremos hoy en The Good Taste?</p>

                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        <a href="{{ route('admin.productos') }}" class="btn btn-outline-warning btn-lg px-4 py-3 fw-bold" style="border-radius: 10px;">
                            <i class="bi bi-box-seam-fill d-block mb-2" style="font-size: 2rem;"></i>
                            Ver Productos
                        </a>
                        <a href="{{ route('admin.consultas') }}" class="btn btn-outline-warning btn-lg px-4 py-3 fw-bold position-relative" style="border-radius: 10px;">
                            <i class="bi bi-envelope-fill d-block mb-2" style="font-size: 2rem;"></i>
                            Ver Consultas
                            @if($consultas->count() > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger shadow border border-dark">
                                {{ $consultas->count() }}
                                <span class="visually-hidden">mensajes no leídos</span>
                            </span>
                            @endif
                        </a>
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