<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Good Taste - Procesar Compra</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-5">
        <div class="card bg-secondary text-white p-5 border-warning shadow-lg text-center mx-auto" style="max-width: 600px; border-radius: 15px;">
            <div class="mb-3">
                <i class="bi bi-credit-card-2-front text-warning" style="font-size: 4rem;"></i>
            </div>
            <h2 class="fw-bold text-warning mb-3">¡Estás a un paso de tu pedido!</h2>
            <p class="fs-5">Tu carrito ha sido verificado con éxito y todos los productos están disponibles.</p>
            <hr class="border-light opacity-50 my-4">

            <p class="text-start fw-bold mb-2">Resumen rápido:</p>
            <ul class="list-group list-group-flush text-start bg-dark rounded p-2 mb-4">
                @foreach($carrito as $item)
                <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center border-secondary">
                    {{ $item->producto->nombre }}
                    <span class="badge bg-warning text-dark fw-bold">{{ $item->cantidad }} kg</span>
                </li>
                @endforeach
            </ul>

            <button class="btn btn-warning btn-lg w-100 fw-bold text-dark shadow" onclick="alert('¡Próximamente integrar aquí tu pasarela de pagos o envío a WhatsApp!')">
                Confirmar y Pagar
            </button>

            <a href="{{ url('/carrito') }}" class="btn btn-outline-light btn-sm mt-3 w-100">Volver al carrito</a>
        </div>
    </div>

</body>

</html>