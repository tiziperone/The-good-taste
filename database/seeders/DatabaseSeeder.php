<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Perfil Gerente (acceso total)
        User::updateOrCreate(
            ['email' => 'gerente@thegoodtaste.com'],
            [
                'name' => 'Gerente',
                'apellido' => 'General',
                'password' => Hash::make('password123'),
                'role' => 'gerente',
                'active' => true,
            ]
        );

        // 2. Perfil Admin (solo pedidos y productos)
        User::updateOrCreate(
            ['email' => 'admin@thegoodtaste.com'],
            [
                'name' => 'Admin',
                'apellido' => 'Operativo',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'active' => true,
            ]
        );

        // 3. Perfil Cliente / Usuario estándar
        User::updateOrCreate(
            ['email' => 'cliente@thegoodtaste.com'],
            [
                'name' => 'Cliente',
                'apellido' => 'Prueba',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'active' => true,
            ]
        );
    }
}
