<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoItem extends Model
{
    use HasFactory;

    protected $table = 'carrito_items';

    protected $fillable = [
        'user_id',
        'producto_id',
        'cantidad',
    ];

    // Relación para que el carrito pueda sacar el nombre, precio e imagen del producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
