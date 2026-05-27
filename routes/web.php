<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;

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


// ✅ CORREGIDO: Ahora la ruta pasa por el CompraController y está protegida por auth
Route::get('compra', [CompraController::class, 'index'])->name('compra.index')->middleware('auth');


// CORREGIDO: Ahora pasa por el controlador para guardar la URL de origen
Route::get('carrito', [CarritoController::class, 'index'])->name('carrito.index')->middleware('auth');

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


//Sección Bondiolas (Categoría 1)
Route::get('/bondiola', [ProductoController::class, 'mostrarBondiolas']);
Route::post('/productos/guardar-bondiola', [ProductoController::class, 'storeBondiola'])->name('productos.storeBondiola');

//Sección Milanesas (Categoría 2)
Route::get('/milanesas', [ProductoController::class, 'mostrarMilanesas']);
Route::post('/productos/guardar-milanesa', [ProductoController::class, 'storeMilanesa'])->name('productos.storeMilanesa');

//Sección Pastas (Categoría 3)
Route::get('/pastas', [ProductoController::class, 'mostrarPastas']);
Route::post('/productos/guardar-pasta', [ProductoController::class, 'storePasta'])->name('productos.storePasta');

//Eliminación Común (Borrado Lógico)
Route::post('/productos/eliminar/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');


// Recuperación de Contraseña
Route::get('/recuperar-contrasena', function () {
    return view('recuperar-contrasena');
})->name('password.request');

Route::post('/recuperar-contrasena', [AuthController::class, 'enviarEnlaceRecuperacion'])->name('password.email');
Route::get('/restablecer-password/{token}', [AuthController::class, 'mostrarFormoRestablecer'])->name('password.reset');
Route::post('/restablecer-password', [AuthController::class, 'actualizarPassword'])->name('password.update');


// Operaciones del Carrito
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar')->middleware('auth');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar')->middleware('auth');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar')->middleware('auth');
Route::post('/carrito/actualizar', [CarritoController::class, 'actualizar'])->name('carrito.actualizar')->middleware('auth');
