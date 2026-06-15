<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['users_id', 'nombre', 'email', 'asunto', 'mensaje', 'estado', 'respuesta'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
