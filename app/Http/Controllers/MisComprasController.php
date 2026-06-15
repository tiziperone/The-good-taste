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

        //Traemos las compras ordenadas por la más reciente
        $compras = DB::table('ordens')
            ->where('users_id', $usuarioId)
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->get();

        //Se ubica a cada compra sus productos asociados
        foreach ($compras as $compra) {
            $compra->detalles = DB::table('item_ordens')
                ->join('productos', 'item_ordens.productos_id', '=', 'productos.id')
                ->where('item_ordens.ordens_id', $compra->id)
                ->whereNull('item_ordens.deleted_at')
                ->select('item_ordens.*', 'productos.nombre', 'productos.url_imagen')
                ->get();
        }

        return view('mis-compras', compact('compras'));
    }
}
