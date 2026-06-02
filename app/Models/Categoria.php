<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // 1. Especificamos el nombre real de la tabla de categorías en MariaDB
    protected $table = 'categorias';

    // 2. Habilitamos los campos para asignación masiva
    protected $fillable = [
        'nombre',
        'fechacreacion', // Columnas de control de tiempo
        'actualizacio',
    ];

    // 3.  Le avisamos a Laravel cómo se llaman las columnas de fecha
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = 'actualizacio';

    // 4. Relación uno a muchos con Productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
