<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MisComprasController;

Route::get('/', function () {
    return view('pagina-principal');
});

Route::get('/pagina-principal', function () {
    return view('pagina-principal');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('quienes-somos', function () {
    return view('quienes-somos');
});

// Ruta de catálogo
Route::get('catalogo', function () {
    $tieneBondiolas = \App\Models\Producto::where('categoria_id', 1)->where('activo', true)->exists();
    $tieneMilanesas = \App\Models\Producto::where('categoria_id', 2)->where('activo', true)->exists();
    $tienePastas = \App\Models\Producto::where('categoria_id', 3)->where('activo', true)->exists();

    return view('catalogo', compact('tieneBondiolas', 'tieneMilanesas', 'tienePastas'));
});

Route::get('comercializacion', function () {
    return view('comercializacion');
});

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('terminos-y-usos', function () {
    return view('terminos-y-usos');
});

// Rutas protegidas
// Rutas de cliente autenticado (Compras y Carrito)
Route::middleware(['auth'])->group(function () {
    Route::get('compra', [CompraController::class, 'index'])->name('compra.index');
    Route::post('/guardar-direccion', [CompraController::class, 'guardarDireccionOpcional'])->name('guardar.direccion');

    Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
    Route::post('/carrito/actualizar', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');

    Route::post('/confirmar-compra', [CompraController::class, 'confirmarCompra'])->name('confirmar.compra');
    Route::get('/mis-compras', [MisComprasController::class, 'index'])->name('mis-compras.index');

    // ==========================================
    // PANEL COMPARTIDO: Admin y Gerente (Productos y Pedidos)
    // ==========================================
    Route::middleware(['staff'])->group(function () {
        Route::get('/administracion', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/administracion/productos', [AdminController::class, 'productos'])->name('admin.productos');
        Route::post('/administracion/producto', [AdminController::class, 'store'])->name('admin.store');
        Route::put('/administracion/producto/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::patch('/administracion/producto/{id}/restaurar', [AdminController::class, 'restaurar'])->name('admin.productos.restaurar');

        // Gestión de pedidos
        Route::get('/admin/pedidos', [AdminController::class, 'pedidos'])->name('admin.pedidos');
        Route::put('/admin/pedidos/{id}/estado', [AdminController::class, 'actualizarEstadoPedido'])->name('admin.pedidos.actualizar');
    });

    Route::middleware(['gerente'])->group(function () {
        // Consultas
        Route::get('/administracion/consultas', [AdminController::class, 'consultas'])->name('admin.consultas');
        Route::post('/admin/consultas/{id}/marcar-leido', [AdminController::class, 'marcarLeido'])->name('consultas.marcarLeido');
        Route::post('/admin/consultas/{id}/responder', [AdminController::class, 'responder'])->name('consultas.responder');
        Route::delete('/admin/consultas/{id}/eliminar', [AdminController::class, 'eliminar'])->name('consultas.eliminar');

        // Gestión de usuarios y roles
        Route::get('/admin/usuarios', [AdminController::class, 'verUsuarios'])->name('admin.usuarios');
        Route::post('/admin/usuarios/{id}/banear', [AdminController::class, 'banear'])->name('admin.usuarios.banear');
        Route::post('/admin/usuarios/{id}/hacer-admin', [AdminController::class, 'hacerAdmin'])->name('admin.usuarios.hacerAdmin');
        Route::post('/admin/usuarios/{id}/quitar-admin', [AdminController::class, 'quitarAdmin'])->name('admin.usuarios.quitarAdmin');
    });
});

// Rutas de Autenticación
Route::get('inicio-sesion', function () {
    return view('inicio-sesion');
})->name('login');

Route::get('registro', function () {
    return view('registro');
});

Route::get('validacion-cuenta', function () {
    return view('validacion-cuenta');
})->name('validacion');

Route::post('registro', [AuthController::class, 'registrar']);
Route::post('validacion-cuenta', [AuthController::class, 'reenviarCorreo']);
Route::post('inicio-sesion', [AuthController::class, 'login']);

Route::get('/verificar-correo/{id}', [AuthController::class, 'verificarCorreo'])
    ->middleware('signed')
    ->name('verificar.correo');

Route::post('/cerrar-sesion', [AuthController::class, 'logout']);

// Sección Productos
Route::get('/bondiola', [ProductoController::class, 'mostrarBondiolas']);
Route::get('/milanesas', [ProductoController::class, 'mostrarMilanesas']);
Route::get('/pastas', [ProductoController::class, 'mostrarPastas']);
Route::delete('/productos/eliminar/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// Recuperación de Contraseña
Route::get('/recuperar-contrasena', function () {
    return view('recuperar-contrasena');
})->name('password.request');

Route::post('/recuperar-contrasena', [AuthController::class, 'enviarEnlaceRecuperacion'])->name('password.email');
Route::get('/restablecer-password/{token}', [AuthController::class, 'mostrarFormoRestablecer'])->name('password.reset');
Route::post('/restablecer-password', [AuthController::class, 'actualizarPassword'])->name('password.update');

Route::get('/ping', function () {
    return response('ok', 200);
});
