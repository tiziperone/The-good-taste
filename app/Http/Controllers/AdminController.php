<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Muestra el panel principal
    public function index()
    {
        // Doble seguridad: si no es admin, lo pateamos al inicio
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado. Área exclusiva de administración.');
        }

        // Traemos todos los productos activos (estado == 1 o el nombre de tu columna)
        // Si usas SoftDeletes nativo de Laravel, solo usá Producto::all()
        $productos = Producto::where('estado', 1)->get();

        return view('admin', compact('productos'));
    }

    // Guarda un producto unificado
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'No tienes permisos.');
        }

        // Creamos el producto. Asegurate de que tu modelo Producto tenga estos campos en el $fillable
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'url_imagen' => $request->url_imagen,
            'categoria_id' => $request->categoria_id, // Asumiendo que usas números para categorías (1: Bondiolas, 2: Milanesas, 3: Pastas)
            'estado' => 1 // O omitilo si tiene valor por defecto en la BD
        ]);

        return redirect()->route('admin.index')->with('success', 'Producto agregado exitosamente al catálogo.');
    }
}
