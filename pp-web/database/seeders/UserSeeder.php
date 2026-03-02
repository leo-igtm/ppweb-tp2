<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@arkham.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Gerente
        User::create([
            'name' => 'Gerente Principal',
            'email' => 'gerente@arkham.com',
            'password' => Hash::make('password'),
            'role' => 'gerente',
            'email_verified_at' => now(),
        ]);

        // Agente 1
        User::create([
            'name' => 'Carlos Mendoza',
            'email' => 'carlos@arkham.com',
            'password' => Hash::make('password'),
            'role' => 'agente',
            'email_verified_at' => now(),
        ]);

        // Agente 2
        User::create([
            'name' => 'María González',
            'email' => 'maria@arkham.com',
            'password' => Hash::make('password'),
            'role' => 'agente',
            'email_verified_at' => now(),
        ]);

        // Cliente 1
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password'),
            'role' => 'cliente',
            'email_verified_at' => now(),
        ]);

        // Cliente 2
        User::create([
            'name' => 'Ana López',
            'email' => 'ana@example.com',
            'password' => Hash::make('password'),
            'role' => 'cliente',
            'email_verified_at' => now(),
        ]);
    }
}
