<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function usuarios()
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            abort(403);
        }

        $usuarios = User::select('id', 'name', 'email', 'role', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($u) => [
                'id' => $u->id,
                'name' => $u->name,
                'email' => $u->email,
                'role' => $u->role,
                'created_at' => $u->created_at->format('d/m/Y'),
            ]);

        return Inertia::render('Dashboard/Admin/Usuarios', [
            'usuarios' => $usuarios,
        ]);
    }

    public function estadisticas()
    {
        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            abort(403);
        }

        $totalPropiedades = \App\Models\Propiedad::count();
        $disponibles = \App\Models\Propiedad::where('disponible', true)->count();
        $totalUsuarios = User::count();
        $totalAgentes = User::where('role', 'agente')->count();
        $totalClientes = User::where('role', 'cliente')->count();

        return Inertia::render('Dashboard/Admin/Estadisticas', [
            'stats' => [
                'total_propiedades' => $totalPropiedades,
                'propiedades_disponibles' => $disponibles,
                'total_usuarios' => $totalUsuarios,
                'agentes' => $totalAgentes,
                'clientes' => $totalClientes,
            ],
        ]);
    }
}
