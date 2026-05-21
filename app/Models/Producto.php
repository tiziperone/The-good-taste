<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Para el softDeletes() de tu migración

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'stock_minimo',
        'tipo',
        'url_imagen',
        'activo',
        'categoria_id', // Borramos fechacreacion y actualizacio de acá porque el $table->timestamps() de Laravel se encarga de todo solo en inglés
    ];
}
