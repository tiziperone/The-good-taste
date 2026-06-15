<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //nombre de la tabla de categorías en MariaDB
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'fechacreacion',
        'actualizacio',
    ];

    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = 'actualizacio';

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
