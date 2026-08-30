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

        $compras = DB::table('ordens')
            ->where('users_id', $usuarioId)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->get();

        // CORRECCIÓN VELOCIDAD: Cargar detalles en una sola consulta para evitar saturar la base de datos
        $comprasIds = $compras->pluck('id');

        $todosLosDetalles = DB::table('item_ordens')
            ->join('productos', 'item_ordens.productos_id', '=', 'productos.id')
            ->whereIn('item_ordens.ordens_id', $comprasIds)
            ->whereNull('item_ordens.deleted_at')
            ->select('item_ordens.*', 'productos.nombre', 'productos.url_imagen')
            ->get()
            ->groupBy('ordens_id');

        foreach ($compras as $compra) {
            $compra->detalles = $todosLosDetalles->get($compra->id, collect());
        }

        return view('mis-compras', compact('compras'));
    }
}
