<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function mostrarBondiolas()
    {
        // Traemos todos los productos activos de la base de datos
        $productos = Producto::where('activo', true)->get();

        // Filtramos cada tarjeta por su nombre exacto
        $bondiolaClasica = $productos->where('nombre', 'Bondiola Clásica (1kg)')->first();
        $bondiolaPimenton = $productos->where('nombre', 'Bondiola al Pimentón (1kg)')->first();

        // Enviamos las variables de forma correcta a la vista
        return view('bondiola', compact('bondiolaClasica', 'bondiolaPimenton'));
    }
}
