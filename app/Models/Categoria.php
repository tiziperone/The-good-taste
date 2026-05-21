<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // 1. Especificamos el nombre real de tu tabla de categorías en MariaDB
    protected $table = 'categorias';

    // 2. Habilitamos los campos para asignación masiva
    protected $fillable = [
        'nombre',
        'fechacreacion', // Tus columnas de control de tiempo
        'actualizacio',
    ];

    // 3. EL SECRETO: Le avisamos a Laravel cómo se llaman tus columnas de fecha
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = 'actualizacio';

    // 4. OPCIONAL PERO RECOMENDADO: Relación uno a muchos con Productos
    // Esto te va a servir más adelante si querés hacer por ejemplo: $categoria->productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
