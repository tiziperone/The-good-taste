<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Gestionar Productos</title>
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

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card bg-dark border-secondary shadow">
            <div class="card-header border-secondary bg-secondary text-white fw-bold">
                Catálogo Actual
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
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Eliminar producto">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-secondary">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                No hay productos cargados. ¡Agregá el primero!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para Agregar Productos -->
    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-warning" style="border-radius: 15px;">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold text-warning">Añadir Nuevo Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label text-warning small fw-bold">Categoría del Producto</label>
                            <select class="form-select bg-secondary text-white border-0" name="categoria_id" required>
                                <option value="" disabled selected>Seleccioná en dónde va a aparecer...</option>
                                <option value="1">Bondiolas</option>
                                <option value="2">Milanesas</option>
                                <option value="3">Pastas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-warning small fw-bold">Nombre Exacto</label>
                            <input type="text" class="form-control bg-secondary text-white border-0" name="nombre" placeholder="Ej: Ravioles de Verdura" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-warning small fw-bold">Descripción Corta</label>
                            <textarea class="form-control bg-secondary text-white border-0" name="descripcion" rows="2" placeholder="Describí qué tiene el producto..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-warning small fw-bold">Precio de Venta ($)</label>
                            <input type="number" class="form-control bg-secondary text-white border-0" name="precio" placeholder="Ej: 5000" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label text-warning small fw-bold">Stock Inicial</label>
                                <input type="number" class="form-control bg-secondary text-white border-0" name="stock" placeholder="Ej: 20" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label text-warning small fw-bold">Aviso de Stock Bajo</label>
                                <input type="number" class="form-control bg-secondary text-white border-0" name="stock_minimo" value="5" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-warning small fw-bold">Ruta de la Imagen (Opcional)</label>
                            <input type="text" class="form-control bg-secondary text-white border-0" name="url_imagen" placeholder="Ej: Img/Ravioles.png">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning fw-bold text-dark">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>