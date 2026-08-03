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
        $users = [
            ['name' => 'Administrador',    'email' => 'admin@inmobiliaria.com',  'role' => 'admin'],
            ['name' => 'Gerente Principal','email' => 'gerente@inmobiliaria.com','role' => 'gerente'],
            ['name' => 'Maria Gonzalez',   'email' => 'maria@inmobiliaria.com',   'role' => 'agente'],
            ['name' => 'Juan Perez',       'email' => 'juan@inmobiliaria.com',    'role' => 'agente'],
            ['name' => 'Ana Lopez',        'email' => 'ana@inmobiliaria.com',     'role' => 'agente'],
            ['name' => 'Carlos Cliente',   'email' => 'carlos@example.com',       'role' => 'cliente'],
            ['name' => 'Laura Cliente',    'email' => 'laura@example.com',        'role' => 'cliente'],
        ];

        foreach ($users as $u) {
            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('password'),
                    'role' => $u['role'],
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
