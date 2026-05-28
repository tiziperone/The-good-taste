<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Gestión de Productos</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="bg-dark text-white">

    @include('componentes.navbar')

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-warning"><i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos</h2>
            <button type="button" class="btn btn-success fw-bold shadow" data-bs-toggle="modal" data-bs-target="#modalAgregarProducto">
                <i class="bi bi-plus-circle-fill me-2"></i> Nuevo Producto
            </button>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0 shadow mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card bg-dark border-secondary shadow mb-5">
            <div class="card-header border-secondary bg-secondary text-white fw-bold d-flex justify-content-between align-items-center">
                <span>Catálogo Actual</span>
                <form action="{{ route('admin.index') }}" method="GET" class="d-flex align-items-center gap-2 m-0">
                    <input type="hidden" name="orden_eliminados" value="{{ $ordenEliminados }}">

                    <label class="text-white small mb-0 fw-normal">Ordenar:</label>
                    <select name="orden_activos" class="form-select form-select-sm bg-dark text-white border-0" onchange="this.form.submit()">
                        <option value="desc" {{ $ordenActivos == 'desc' ? 'selected' : '' }}>Más nuevos</option>
                        <option value="asc" {{ $ordenActivos == 'asc' ? 'selected' : '' }}>Más antiguos</option>
                    </select>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr class="text-warning">
                            <th class="ps-3">ID</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th class="text-center pe-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $prod)
                        <tr>
                            <td class="ps-3">#{{ $prod->id }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset($prod->url_imagen ?? 'Img/LogoOscuro.png') }}" style="width:40px; height:40px; object-fit:cover; border-radius:5px; border: 1px solid #6c757d;">
                                    <span class="fw-bold">{{ $prod->nombre }}</span>
                                </div>
                            </td>
                            <td>
                                @if($prod->categoria_id == 1) Bondiolas
                                @elseif($prod->categoria_id == 2) Milanesas
                                @elseif($prod->categoria_id == 3) Pastas
                                @else Otra @endif
                            </td>
                            <td>
                                @if($prod->stock <= $prod->stock_minimo)
                                    <span class="badge bg-danger">Bajo: {{ $prod->stock }}</span>
                                    @else
                                    <span class="badge bg-success">Ok: {{ $prod->stock }}</span>
                                    @endif
                            </td>
                            <td class="fw-bold">$ {{ number_format($prod->precio, 0, ',', '.') }}</td>
                            <td class="text-center pe-3">
                                <form action="{{ route('productos.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('¿Seguro querés eliminar este producto de la tienda?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Eliminar producto">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-secondary">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i> No hay productos cargados.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card bg-dark border-danger shadow mb-5">
            <div class="card-header border-danger bg-danger text-white fw-bold d-flex justify-content-between align-items-center">
                <span><i class="bi bi-trash3-fill me-2"></i> Historial de Eliminados</span>
                <form action="{{ route('admin.index') }}" method="GET" class="d-flex align-items-center gap-2 m-0">
                    <input type="hidden" name="orden_activos" value="{{ $ordenActivos }}">

                    <label class="text-white small mb-0 fw-normal">Ordenar por baja:</label>
                    <select name="orden_eliminados" class="form-select form-select-sm bg-dark text-white border-0" onchange="this.form.submit()">
                        <option value="desc" {{ $ordenEliminados == 'desc' ? 'selected' : '' }}>Eliminados recientes</option>
                        <option value="asc" {{ $ordenEliminados == 'asc' ? 'selected' : '' }}>Eliminados antiguos</option>
                    </select>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0 text-muted">
                    <thead>
                        <tr class="text-danger">
                            <th class="ps-3">ID</th>
                            <th>Producto</th>
                            <th>Agregado el</th>
                            <th>Eliminado el</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productosEliminados as $eliminado)
                        <tr>
                            <td class="ps-3">#{{ $eliminado->id }}</td>
                            <td>{{ $eliminado->nombre }}</td>
                            <td>{{ $eliminado->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-danger fw-bold">{{ $eliminado->deleted_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No hay productos en el historial de eliminados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>