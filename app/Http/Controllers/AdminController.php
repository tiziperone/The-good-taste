<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // Recibimos los parámetros de orden por separado (por defecto 'desc')
        $ordenActivos = $request->query('orden_activos', 'desc');
        $ordenEliminados = $request->query('orden_eliminados', 'desc');

        // Filtramos cada tabla según su propio parámetro
        $productos = Producto::orderBy('created_at', $ordenActivos)->get();
        $productosEliminados = Producto::onlyTrashed()->orderBy('deleted_at', $ordenEliminados)->get();

        // Mandamos las variables a la vista de productos
        return view('admin', compact('productos', 'productosEliminados', 'ordenActivos', 'ordenEliminados'));
    }

    // NUEVO MÉTODO PARA LAS CONSULTAS
    public function consultas()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // Traemos las consultas ordenadas por las más recientes
        $consultas = Consulta::orderBy('created_at', 'desc')->get();

        // Retorna a la nueva vista de consultas
        return view('admin-consultas', compact('consultas'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // VALIDACIÓN: Aquí le decimos que la descripción puede ser nula (nullable)
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'categoria_id' => 'required|integer'
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'stock_minimo' => $request->stock_minimo,
            'url_imagen' => $request->url_imagen,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('admin.index')->with('success', 'Producto agregado correctamente al catálogo.');
    }
}
