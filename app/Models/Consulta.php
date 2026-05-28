<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = ['users_id', 'nombre', 'email', 'asunto', 'mensaje', 'estado'];

    //Permite acceder a $c->user->name
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
