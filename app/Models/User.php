<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// ¡IMPORTANTE! Agregamos 'last_seen_at' al final de esta lista
#[Fillable(['name', 'apellido', 'email', 'password', 'role', 'active', 'last_seen_at'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            // ¡IMPORTANTE! Agregamos esto para que Laravel lo trate como fecha
            'last_seen_at' => 'datetime',
        ];
    }

    public function carritoItems()
    {
        return $this->hasMany(CarritoItem::class, 'user_id');
    }
}
