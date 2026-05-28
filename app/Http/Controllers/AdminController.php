<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Seguridad: Solo admins
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // CORREGIDO: Como usas SoftDeletes (deleted_at), Laravel ya oculta los eliminados solo.
        // Simplemente traemos todos los productos ordenados por los más nuevos.
        $productos = Producto::orderBy('id', 'desc')->get();

        //Traemos todas las consultas
        $consultas = Consulta::orderBy('created_at', 'desc')->get();

        // PASA AMBAS VARIABLES A LA VISTA
        return view('admin', compact('productos', 'consultas'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        // CORREGIDO: Quitamos el campo 'estado' porque tu tabla no lo usa
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
