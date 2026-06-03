<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use App\Models\CarritoItem;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();

        // Si se recibe un producto específico (botón "Comprar Ahora"), creamos un carrito temporal
        if ($request->has('producto_id')) {
            $producto = Producto::findOrFail($request->producto_id);
            $cantidad = $request->input('cantidad', 1);

            $item = new CarritoItem([
                'user_id' => $usuario->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad
            ]);

            $item->setRelation('producto', $producto);

            $carrito = collect([$item]);
        } else {
            // Si no, cargamos el carrito normal de la base de datos
            $carrito = CarritoItem::with('producto')->where('user_id', $usuario->id)->get();
        }

        $direccionesGuardadas = Direccion::where('id_usuario', $usuario->id)->get();

        return view('compra', compact('carrito', 'direccionesGuardadas'));
    }

    // Guarda una nueva dirección en la base de datos si el usuario lo solicita
    public function guardarDireccionOpcional(Request $request)
    {
        $request->validate([
            'calle' => 'required|string|max:255',
            'altura' => 'required|string|max:255',
            'piso_depto' => 'nullable|string|max:255',
            'nombre_direccion' => 'nullable|string|max:255',
        ]);

        if ($request->has('guardar_futura')) {
            Direccion::create([
                'id_usuario' => Auth::id(),
                'nombre' => $request->input('nombre_direccion') ?? 'Mi Dirección',
                'calle' => $request->input('calle'),
                'altura' => $request->input('altura'),
                'piso_depto' => $request->input('piso_depto'),
            ]);
        }

        return response()->json(['success' => true]);
    }

    // Vacía el carrito tras confirmar la compra
    public function confirmarCompra(Request $request)
    {
        // Solo eliminamos los registros si la compra proviene del carrito general
        if ($request->input('es_carrito')) {
            CarritoItem::where('user_id', Auth::id())->delete();
        }

        return response()->json(['success' => true]);
    }
}
