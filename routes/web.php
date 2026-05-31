<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\AdminController;

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

Route::get('catalogo', function () {
    return view('catalogo');
});

Route::get('comercializacion', function () {
    return view('comercializacion');
});


Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('terminos-y-usos', function () {
    return view('terminos-y-usos');
});


// Rutas protegidas por autenticación general
Route::middleware(['auth'])->group(function () {

    // Rutas de Compra y Carrito
    Route::get('compra', [CompraController::class, 'index'])->name('compra.index');
    Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
    Route::post('/carrito/actualizar', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');

    // RUTAS: Panel de Administración
    Route::get('/administracion', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/administracion/producto', [AdminController::class, 'store'])->name('admin.store');

    // RUTA NUEVA: Para guardar los cambios al editar un producto
    Route::put('/administracion/producto/{id}', [AdminController::class, 'update'])->name('admin.update');
});


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


// Sección Bondiolas (Categoría 1)
Route::get('/bondiola', [ProductoController::class, 'mostrarBondiolas']);
// Sección Milanesas (Categoría 2)
Route::get('/milanesas', [ProductoController::class, 'mostrarMilanesas']);
// Sección Pastas (Categoría 3)
Route::get('/pastas', [ProductoController::class, 'mostrarPastas']);

// Eliminación (Borrado Lógico) - CORREGIDO A MÉTODO DELETE
Route::delete('/productos/eliminar/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');


// Recuperación de Contraseña
Route::get('/recuperar-contrasena', function () {
    return view('recuperar-contrasena');
})->name('password.request');

Route::post('/recuperar-contrasena', [AuthController::class, 'enviarEnlaceRecuperacion'])->name('password.email');
Route::get('/restablecer-password/{token}', [AuthController::class, 'mostrarFormoRestablecer'])->name('password.reset');
Route::post('/restablecer-password', [AuthController::class, 'actualizarPassword'])->name('password.update');

// Ruta para las consultas del panel de administrador
Route::get('/admin/consultas', [AdminController::class, 'consultas'])->name('admin.consultas');

// NUEVA RUTA PARA EL BOTÓN
Route::post('/admin/consultas/{id}/marcar-leido', [AdminController::class, 'marcarLeido'])->name('consultas.marcarLeido');
// Ruta para responder consultas
Route::post('/admin/consultas/{id}/responder', [AdminController::class, 'responder'])->name('consultas.responder');

Route::delete('/admin/consultas/{id}/eliminar', [AdminController::class, 'eliminar'])->name('consultas.eliminar');
