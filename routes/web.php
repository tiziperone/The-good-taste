<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('pagina-principal');
});

Route::get('/milanesas', function () {
    return view('milanesas');
});

Route::get('/pastas', function () {
    return view('pastas');
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

Route::get('compra', function () {
    return view('compra');
});

Route::get('carrito', function () {
    return view('carrito');
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

Route::post('/cerrar-sesion', [App\Http\Controllers\AuthController::class, 'logout']);

// ==========================================
// CONTROL DE RUTAS PARA PRODUCTOS 
// ==========================================
Route::get('/bondiola', [ProductoController::class, 'mostrarBondiolas']);
Route::post('/productos/guardar', [ProductoController::class, 'store'])->name('productos.store');
