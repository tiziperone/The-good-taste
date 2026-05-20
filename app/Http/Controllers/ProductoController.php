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

    // NUEVO MÉTODO: Procesa el formulario del menú flotante
    public function store(Request $request)
    {
        // Validamos que los datos requeridos no vengan vacíos
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);

        // Insertamos el producto de forma masiva aprovechando el $fillable del modelo
        Producto::create([
            'nombre'       => $request->nombre,
            'descripcion'  => $request->descripcion,
            'precio'       => $request->precio,
            'stock'        => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'url_imagen'   => $request->url_imagen ?? 'Img/BondiolaTarjetaSinPimenton.png',
            'activo'       => true,
        ]);

        // Volvemos a la pantalla de bondiolas con un mensaje temporal de éxito
        return back()->with('success', '¡Producto añadido exitosamente a MariaDB!');
    }
}
