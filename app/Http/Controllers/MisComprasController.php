<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MisComprasController extends Controller
{
    public function index()
    {
        $usuarioId = Auth::id();

        // Traemos las compras ordenadas por la más reciente
        $compras = DB::table('orden')
            ->where('ID_usuario', $usuarioId)
            ->orderBy('Created_ad', 'desc')
            ->get();

        // Le adjuntamos a cada compra sus productos asociados
        foreach ($compras as $compra) {
            $compra->detalles = DB::table('itemorden')
                ->join('productos', 'itemorden.ID_producto', '=', 'productos.id')
                ->where('itemorden.ID_orden', $compra->ID ?? $compra->id) // Laravel a veces devuelve 'id' en minúscula
                ->select('itemorden.*', 'productos.nombre', 'productos.url_imagen')
                ->get();
        }

        return view('mis-compras', compact('compras'));
    }
}
