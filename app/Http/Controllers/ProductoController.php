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

    // PROCESAR FORMULARIO (MÉTODO CREAR)
    public function store(Request $request)
    {
        // Validamos que los datos requeridos no vengan vacíos
        $request->validate([
            'nombre'       => 'required|string|max:255',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);

        // Insertamos el producto vinculándolo automáticamente a la categoría 1 de DBeaver
        Producto::create([
            'nombre'       => $request->nombre,
            'descripcion'  => $request->descripcion,
            'precio'       => $request->precio,
            'stock'        => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'tipo'         => 'Bondiola', // Mapea con la columna de tu migración
            'url_imagen'   => $request->url_imagen ?? 'Img/BondiolaTarjetaSinPimenton.png',
            'categoria_id' => 1, // Conexión automática con el ID 1 de tu categoría en DBeaver
            'activo'       => true,
        ]);

        // Volvemos a la pantalla de bondiolas con un mensaje temporal de éxito
        return back()->with('success', '¡Producto añadido exitosamente!');
    }

    // ELIMINAR PRODUCTO (BORRADO LÓGICO DE LA CÁTEDRA)
    public function destroy($id)
    {
        // Buscamos el producto por su ID
        $producto = Producto::findOrFail($id);

        // En lugar de borrar la fila físicamente, la desactivamos
        $producto->update([
            'activo' => false
        ]);

        return back()->with('success', '¡Producto removido del catálogo exitosamente!');
    }
}
