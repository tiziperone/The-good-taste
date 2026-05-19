<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController; //para que laravel busque aca el controlador contacto

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
});

Route::get('registro', function () {
    return view('registro');
});
Route::post('registro', function () {

    return view('validacion-cuenta');
});

Route::get('validacion-cuenta', function () {
    return view('validacion-cuenta');
});
Route::post('registro', function () {
    return redirect('/validacion-cuenta');
});


// Esto hace que si aprietan "Reenviar", la página se recargue sin dar error
Route::post('/validacion-cuenta', function () {
    return back()->with('message', '¡Enlace de validación reenviado! (Simulado)');
});
