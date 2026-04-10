<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;//para que laravel busque aca el controlador contacto

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bondiola', function () {
    return view('bondiola');
});

Route::get('/milanesas', function () {
    return view('milanesas');
});

Route::get('/pastas', function(){
    return view('pastas');
});

Route::get('/pagina-principal', function ()
{ return view('pagina-principal');
});

//ruta para que desde el boton "contactanos" devuelva el formulario de contacto
Route::get('/contacto', function () {
    return view('contacto');
});//retorna la vista contacto cuando se realiza una peticion GET a la ruta /contacto

Route::get('quienes-somos', function () {
    return view('quienes-somos');
});

//para procesar el formulario
Route::post('/contacto', [ContactoController::class, 'procesar']);
//retorna la vista exito cuando se realiza una peticion POST a la ruta /contacto