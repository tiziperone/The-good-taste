<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    use SoftDeletes;

    // Permitimos la asignación masiva de estos campos
    protected $fillable = [
        'users_id',
        'total',
        'estado',
        'metodo_pago',
        'tipo_envio'
    ];

    // Relación con el usuario que hizo la orden
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relación con los items de la orden (opcional para el futuro)
    public function items()
    {
        return $this->hasMany(ItemOrden::class, 'ordens_id');
    }
}
