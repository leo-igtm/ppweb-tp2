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
            'name' => 'Admin Sistema',
            'email' => 'admin@inmobiliaria.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Agentes
        User::create([
            'name' => 'María González',
            'email' => 'maria@inmobiliaria.com',
            'password' => Hash::make('password'),
            'role' => 'agente',
        ]);

        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@inmobiliaria.com',
            'password' => Hash::make('password'),
            'role' => 'agente',
        ]);

        User::create([
            'name' => 'Ana Martínez',
            'email' => 'ana@inmobiliaria.com',
            'password' => Hash::make('password'),
            'role' => 'agente',
        ]);

        // Clientes
        User::create([
            'name' => 'Carlos López',
            'email' => 'carlos@example.com',
            'password' => Hash::make('password'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Laura Fernández',
            'email' => 'laura@example.com',
            'password' => Hash::make('password'),
            'role' => 'cliente',
        ]);
    }
}
