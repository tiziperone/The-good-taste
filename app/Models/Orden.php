<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'users_id',
        'total',
        'estado',
        'forma_pago',
        'metodo_envio',
        'direccion_envio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function items()
    {
        return $this->hasMany(ItemOrden::class, 'ordens_id');
    }
}
