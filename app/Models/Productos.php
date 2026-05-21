<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // 1. Definimos el nombre exacto de la tabla en MariaDB (por si las dudas)
    protected $table = 'productos';

    // 2. Habilitamos la asignación masiva para tu formulario [cite: 174]
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'stock_minimo',
        'url_imagen',
        'activo',
        'categoria_id',
        'fechacreacion',  // Permitimos escribir la fecha de creación
        'actualizacio',  // Permitimos escribir la fecha de actualización
    ];

    // 3. Convertimos los tipos de datos automáticamente al leerlos [cite: 127]
    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
        'stock_minimo' => 'integer',
        'activo' => 'boolean',
    ];

    // 4. EL SECRETO: Le avisamos a Laravel los nombres de tus columnas de tiempo
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = 'actualizacio';
}
