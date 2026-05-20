<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController; //para que laravel busque aca el controlador contacto
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pagina-principal');
});

Route::get('/bondiola', function () {
    return view('bondiola');
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

//ruta para que desde el boton "contactanos" devuelva el formulario de contacto
Route::get('/contacto', function () {
    return view('contacto');
}); //retorna la vista contacto cuando se realiza una peticion GET a la ruta /contacto

Route::get('quienes-somos', function () {
    return view('quienes-somos');
});

Route::get('catalogo', function () {
    return view('catalogo');
});

Route::get('comercializacion', function () {
    return view('comercializacion');
});

//para procesar el formulario
Route::post('/contacto', [ContactoController::class, 'procesar']);
//retorna la vista exito cuando se realiza una peticion POST a la ruta /contacto

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


// Ruta que se activa cuando el usuario hace clic en el botón de su Gmail
Route::get('/verificar-correo/{id}', [AuthController::class, 'verificarCorreo'])
    ->middleware('signed')
    ->name('verificar.correo');


Route::post('/cerrar-sesion', [App\Http\Controllers\AuthController::class, 'logout']);
