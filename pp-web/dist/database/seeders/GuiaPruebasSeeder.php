<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GuiaPruebasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::updateOrCreate([
            'email' => 'admin@inmobiliaria.com',
        ], [
            'name' => 'Administrador Prueba',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Agentes
        User::updateOrCreate([
            'email' => 'maria@inmobiliaria.com',
        ], [
            'name' => 'María (Agente)',
            'password' => Hash::make('password'),
            'role' => 'agente',
            'email_verified_at' => now(),
        ]);

        User::updateOrCreate([
            'email' => 'juan@inmobiliaria.com',
        ], [
            'name' => 'Juan (Agente)',
            'password' => Hash::make('password'),
            'role' => 'agente',
            'email_verified_at' => now(),
        ]);

        User::updateOrCreate([
            'email' => 'ana@inmobiliaria.com',
        ], [
            'name' => 'Ana (Agente)',
            'password' => Hash::make('password'),
            'role' => 'agente',
            'email_verified_at' => now(),
        ]);

        // Clientes
        User::updateOrCreate([
            'email' => 'carlos@example.com',
        ], [
            'name' => 'Carlos (Cliente)',
            'password' => Hash::make('password'),
            'role' => 'cliente',
            'email_verified_at' => now(),
        ]);

        User::updateOrCreate([
            'email' => 'laura@example.com',
        ], [
            'name' => 'Laura (Cliente)',
            'password' => Hash::make('password'),
            'role' => 'cliente',
            'email_verified_at' => now(),
        ]);
    }
}
