<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Img/LogoOscuro.png') }}" type="image-png">
    <title>The Good Taste - Gestión de Productos</title>

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
                        <a href="{{ route('admin.index') }}" class="nav-link text-start border-0 text-decoration-none">
                            <i class="bi bi-house-door-fill me-2"></i> Inicio
                        </a>
                        <a href="{{ route('admin.productos') }}" class="nav-link active text-start border-0 text-decoration-none">
                            <i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos
                        </a>
                        <a href="{{ route('admin.pedidos') }}" class="nav-link text-start border-0 text-decoration-none">
                            <i class="bi bi-bag-check-fill me-2"></i> Gestión de Pedidos
                        </a>
                        <a href="{{ route('admin.consultas') }}" class="nav-link text-start border-0 position-relative text-decoration-none">
                            <i class="bi bi-envelope-fill me-2"></i> Gestión de Consultas
                            {{-- CORRECCIÓN: Ahora cuenta correctamente solo los mensajes no leídos --}}
                            @php $mensajesNuevos = $consultas->where('estado', 0)->count(); @endphp
                            @if($mensajesNuevos > 0)
                            <span class="position-absolute top-50 end-0 translate-middle-y me-3 badge rounded-pill bg-danger">
                                {{ $mensajesNuevos }}
                            </span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-warning m-0"><i class="bi bi-box-seam-fill me-2"></i> Gestión de Productos</h2>
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
                        <form action="{{ route('admin.productos') }}" method="GET" class="d-flex align-items-center gap-2 m-0">
                            <input type="hidden" name="orden_eliminados" value="{{ $ordenEliminados }}">

                            <label class="text-white small mb-0 fw-normal">Ordenar por:</label>
                            <select name="orden_activos" class="form-select form-select-sm bg-dark text-white border-0" onchange="this.form.submit()">
                                <option value="desc" {{ $ordenActivos == 'desc' ? 'selected' : '' }}>Más nuevos</option>
                                <option value="asc" {{ $ordenActivos == 'asc' ? 'selected' : '' }}>Más antiguos</option>
                                <option value="stock_asc" {{ $ordenActivos == 'stock_asc' ? 'selected' : '' }}>Menos stock</option>
                                <option value="stock_desc" {{ $ordenActivos == 'stock_desc' ? 'selected' : '' }}>Más stock</option>
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
                                    <th>Agregado el</th>
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
                                    <td class="text-white-50">{{ $prod->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-center pe-3">
                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" class="btn btn-outline-warning btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#modalEditarProducto{{ $prod->id }}" title="Editar producto">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>

                                            <form action="{{ route('productos.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('¿Seguro querés eliminar este producto de la tienda?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Eliminar producto">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalEditarProducto{{ $prod->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark text-white border-warning" style="border-radius: 15px;">
                                            <div class="modal-header border-secondary">
                                                <h5 class="modal-title fw-bold text-warning">Editar Producto #{{ $prod->id }}</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.update', $prod->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body text-start">
                                                    <div class="mb-3">
                                                        <label class="form-label text-warning small fw-bold">Categoría del Producto</label>
                                                        <select class="form-select bg-secondary text-white border-0" name="categoria_id" required>
                                                            <option value="1" {{ $prod->categoria_id == 1 ? 'selected' : '' }}>Bondiolas</option>
                                                            <option value="2" {{ $prod->categoria_id == 2 ? 'selected' : '' }}>Milanesas</option>
                                                            <option value="3" {{ $prod->categoria_id == 3 ? 'selected' : '' }}>Pastas</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-warning small fw-bold">Nombre Exacto</label>
                                                        <input type="text" class="form-control bg-secondary text-white border-0" name="nombre" value="{{ $prod->nombre }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-warning small fw-bold">Descripción Corta</label>
                                                        <textarea class="form-control bg-secondary text-white border-0" name="descripcion" rows="2">{{ $prod->descripcion }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-warning small fw-bold">Precio de Venta ($)</label>
                                                        <input type="number" class="form-control bg-secondary text-white border-0" name="precio" value="{{ $prod->precio }}" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label class="form-label text-warning small fw-bold">Stock Actual</label>
                                                            <input type="number" class="form-control bg-secondary text-white border-0" name="stock" value="{{ $prod->stock }}" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label class="form-label text-warning small fw-bold">Aviso de Stock Bajo</label>
                                                            <input type="number" class="form-control bg-secondary text-white border-0" name="stock_minimo" value="{{ $prod->stock_minimo }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label text-warning small fw-bold">Ruta de la Imagen</label>
                                                        <input type="text" class="form-control bg-secondary text-white border-0" name="url_imagen" value="{{ $prod->url_imagen }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-warning fw-bold text-dark">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-secondary">
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
                        <form action="{{ route('admin.productos') }}" method="GET" class="d-flex align-items-center gap-2 m-0">
                            <input type="hidden" name="orden_activos" value="{{ $ordenActivos }}">

                            <label class="text-white small mb-0 fw-normal">Ordenar por baja:</label>
                            <select name="orden_eliminados" class="form-select form-select-sm bg-dark text-white border-0" onchange="this.form.submit()">
                                <option value="desc" {{ $ordenEliminados == 'desc' ? 'selected' : '' }}>Recientes</option>
                                <option value="asc" {{ $ordenEliminados == 'asc' ? 'selected' : '' }}>Antiguos</option>
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
                                    <th class="text-center pe-3">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productosEliminados as $eliminado)
                                <tr>
                                    <td class="ps-3">#{{ $eliminado->id }}</td>
                                    <td>{{ $eliminado->nombre }}</td>
                                    <td>{{ $eliminado->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-danger fw-bold">{{ $eliminado->deleted_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-center pe-3">
                                        <form action="{{ route('admin.productos.restaurar', $eliminado->id) }}" method="POST" onsubmit="return confirm('¿Querés volver a activar este producto en el catálogo?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-success btn-sm rounded-circle" title="Reactivar producto">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No hay productos en el historial de eliminados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-success" style="border-radius: 15px;">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold text-success">Añadir Nuevo Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="mb-3">
                            <label class="form-label text-success small fw-bold">Categoría del Producto</label>
                            <select class="form-select bg-secondary text-white border-0" name="categoria_id" required>
                                <option value="1">Bondiolas</option>
                                <option value="2">Milanesas</option>
                                <option value="3">Pastas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-success small fw-bold">Nombre Exacto</label>
                            <input type="text" class="form-control bg-secondary text-white border-0" name="nombre" placeholder="Ej: Ravioles de Verdura" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-success small fw-bold">Descripción Corta</label>
                            <textarea class="form-control bg-secondary text-white border-0" name="descripcion" rows="2" placeholder="Describí qué tiene el producto..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-success small fw-bold">Precio de Venta ($)</label>
                            <input type="number" class="form-control bg-secondary text-white border-0" name="precio" placeholder="Ej: 5000" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label text-success small fw-bold">Stock Inicial</label>
                                <input type="number" class="form-control bg-secondary text-white border-0" name="stock" placeholder="Ej: 20" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label text-success small fw-bold">Aviso de Stock Bajo</label>
                                <input type="number" class="form-control bg-secondary text-white border-0" name="stock_minimo" value="5" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-success small fw-bold">Ruta de la Imagen (Opcional)</label>
                            <input type="text" class="form-control bg-secondary text-white border-0" name="url_imagen" placeholder="Ej: Img/Ravioles.png">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success fw-bold text-white">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @include('componentes.botonHaciaArriba')
    @include('componentes.footer')
</body>

</html>