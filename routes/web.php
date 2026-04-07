<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactoController;//para que laravel busque aca el controlador contacto

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pagina-principal', function ()
{ return view('pagina-principal');
});

//para mostrar el formulario
Route::get('/contacto', function () {
    return view('contacto');
});//retorna la vista contacto cuando se realiza una peticion GET a la ruta /contacto

//para procesar el formulario
Route::post('/contacto', [ContactoController::class, 'procesar']);
//retorna la vista exito cuando se realiza una peticion POST a la ruta /contacto