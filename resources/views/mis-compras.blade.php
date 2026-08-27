<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ secure_asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Mis Compras</title>

    <link href="{{ secure_asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('css/estilos.css') }}">
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-4 mb-4">
        @include('componentes.botonesAtrasAdelante')
    </div>

    <hr class="border-warning border-2 opacity-100">

    <div class="container mt-5 mb-5" style="min-height: 50vh;">
        <h2 class="fw-bold text-warning mb-4" style="font-family: 'Montserrat', sans-serif;">
            <i class="bi bi-bag-check-fill me-2"></i> Mis Compras
        </h2>

        @if(isset($compras) && $compras->count() > 0)
        <div class="accordion custom-accordion" id="acordeonCompras">

            @foreach($compras as $compra)
            <div class="accordion-item bg-dark border-secondary mb-3 shadow-sm" style="border-radius: 10px; overflow: hidden;">
                <h2 class="accordion-header" id="heading-{{ $compra->id }}">
                    <button class="accordion-button collapsed bg-secondary text-white fw-bold d-flex flex-wrap gap-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $compra->id }}" aria-expanded="false" aria-controls="collapse-{{ $compra->id }}" style="box-shadow: none;">

                        <div class="d-flex flex-column me-auto">
                            <span class="text-warning small text-uppercase">Pedido #{{ str_pad($compra->id, 5, '0', STR_PAD_LEFT) }}</span>
                            <span class="fs-5">{{ \Carbon\Carbon::parse($compra->created_at)->format('d/m/Y - H:i') }} hs</span>
                        </div>

                        <div class="d-flex align-items-center gap-4 me-3">
                            <div class="text-end d-none d-sm-block">
                                <span class="d-block small text-light opacity-75">Estado</span>

                                {{-- Lógica de estados sincronizada con el panel admin --}}
                                @switch($compra->estado)
                                @case('En proceso')
                                @case('0')
                                <span class="badge bg-warning text-dark"><i class="bi bi-clock-history me-1"></i> En proceso</span>
                                @break
                                @case('Listo para enviar/retirar')
                                <span class="badge bg-info text-dark"><i class="bi bi-box-seam me-1"></i> Listo para enviar/retirar</span>
                                @break
                                @case('Enviado')
                                <span class="badge bg-primary"><i class="bi bi-truck me-1"></i> Enviado</span>
                                @break
                                @case('Entregado/retirado')
                                @case('1')
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Entregado/retirado</span>
                                @break
                                @default
                                <span class="badge bg-secondary"><i class="bi bi-info-circle me-1"></i> {{ $compra->estado }}</span>
                                @endswitch

                            </div>
                            <div class="text-end">
                                <span class="d-block small text-light opacity-75">Total</span>
                                <span class="fs-5 text-warning fw-bold">$ {{ number_format($compra->total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </button>
                </h2>

                <div id="collapse-{{ $compra->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $compra->id }}" data-bs-parent="#acordeonCompras">
                    <div class="accordion-body bg-dark text-light border-top border-secondary p-4">

                        <h6 class="text-warning fw-bold border-bottom border-secondary pb-2"><i class="bi bi-list-ul me-2"></i>Productos del Pedido</h6>
                        <div class="table-responsive">
                            <table class="table table-dark table-sm table-borderless align-middle mb-0">
                                <tbody>
                                    @if(isset($compra->detalles))
                                    @foreach($compra->detalles as $detalle)
                                    <tr>
                                        <td style="width: 40px;">
                                            <img src="{{ secure_asset($detalle->url_imagen ?? 'Img/BondiolaTarjetaSinPimenton.png') }}" alt="Producto" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                        </td>
                                        <td>{{ $detalle->nombre ?? 'Producto Eliminado' }}</td>
                                        <td class="text-center text-secondary">{{ $detalle->cantidad }} u/kg</td>
                                        <td class="text-end fw-bold text-light">$ {{ number_format($detalle->cantidad * $detalle->precioUnitario, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @else
        <div class="card text-bg-dark border-secondary p-5 text-center shadow-lg my-5" style="border-radius: 15px;">
            <div class="mb-4">
                <i class="bi bi-receipt text-secondary" style="font-size: 4rem;"></i>
            </div>
            <h3 class="fw-bold text-light mb-3">Aún no tenés compras realizadas</h3>
            <p class="text-secondary mb-4 mx-auto" style="max-width: 500px;">
                Cuando realices y confirmes un pedido, el historial detallado de tus compras aparecerá acá.
            </p>
            <div>
                <a href="{{ secure_url('/catalogo') }}" class="btn btn-warning fw-bold text-dark px-4 py-2 shadow">
                    Ir al Catálogo
                </a>
            </div>
        </div>
        @endif

    </div>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')

    <script src="{{ secure_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <style>
        .custom-accordion .accordion-button::after {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .custom-accordion .accordion-button:not(.collapsed) {
            background-color: #ffc107 !important;
            color: #212529 !important;
        }

        .custom-accordion .accordion-button:not(.collapsed)::after {
            filter: none;
        }

        .custom-accordion .accordion-button:not(.collapsed) .text-warning {
            color: #212529 !important;
        }

        .custom-accordion .accordion-button:not(.collapsed) .text-light,
        .custom-accordion .accordion-button:not(.collapsed) .badge.bg-warning {
            color: #212529 !important;
            border: 1px solid #212529;
        }
    </style>
</body>

</html>