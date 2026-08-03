<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class GerenteController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user || !$user->isGerente()) {
            abort(403);
        }

        $propiedades = Propiedad::with('agente:id,name,email')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($p) => [
                'id' => $p->id,
                'titulo' => $p->titulo,
                'tipo' => $p->tipo,
                'operacion' => $p->operacion,
                'precio' => $p->precio,
                'ciudad' => $p->ciudad,
                'disponible' => $p->disponible,
                'agente' => $p->agente ? $p->agente->name : null,
                'created_at' => $p->created_at->format('d/m/Y'),
            ]);

        $agentes = User::where('role', 'agente')
            ->select('id', 'name', 'email')
            ->withCount('propiedades')
            ->get();

        $stats = [
            'total_propiedades' => Propiedad::count(),
            'disponibles' => Propiedad::where('disponible', true)->count(),
            'vendidas' => Propiedad::where('disponible', false)->count(),
            'total_agentes' => User::where('role', 'agente')->count(),
            'total_clientes' => User::where('role', 'cliente')->count(),
            'por_tipo' => Propiedad::selectRaw('tipo, count(*) as total')
                ->groupBy('tipo')
                ->pluck('total', 'tipo'),
            'por_ciudad' => Propiedad::selectRaw('ciudad, count(*) as total')
                ->groupBy('ciudad')
                ->pluck('total', 'ciudad'),
        ];

        return Inertia::render('Dashboard/Gerente', [
            'propiedades' => $propiedades,
            'agentes' => $agentes,
            'stats' => $stats,
        ]);
    }

    public function permisos()
    {
        $user = Auth::user();
        if (!$user || !$user->isGerente()) {
            abort(403);
        }

        $roles = ['admin', 'gerente', 'agente', 'cliente'];
        $permissionKeys = [
            'manage_users',
            'create_property',
            'edit_any_property',
            'edit_own_property',
            'delete_any_property',
            'delete_own_property',
        ];

        $permisos = [];
        foreach ($roles as $role) {
            $row = RolePermission::where('role', $role)->first();

            if ($row) {
                $permisos[$role] = [
                    'manage_users' => $row->manage_users,
                    'create_property' => $row->create_property,
                    'edit_any_property' => $row->edit_any_property,
                    'edit_own_property' => $row->edit_own_property,
                    'delete_any_property' => $row->delete_any_property,
                    'delete_own_property' => $row->delete_own_property,
                ];
                continue;
            }

            $defaults = config('permissions.'.$role, config('permissions.cliente'));
            $permisos[$role] = [];
            foreach ($permissionKeys as $key) {
                $permisos[$role][$key] = (bool) ($defaults[$key] ?? false);
            }
        }

        return Inertia::render('Dashboard/Gerente/Permisos', [
            'permisos' => $permisos,
            'roles' => $roles,
        ]);
    }

    public function actualizarPermisos(Request $request)
    {
        $user = Auth::user();
        if (!$user || !$user->isGerente()) {
            abort(403);
        }

        $roles = ['admin', 'gerente', 'agente', 'cliente'];
        $permissionKeys = [
            'manage_users',
            'create_property',
            'edit_any_property',
            'edit_own_property',
            'delete_any_property',
            'delete_own_property',
        ];

        $rules = [];
        foreach ($roles as $role) {
            foreach ($permissionKeys as $key) {
                $rules["permisos.$role.$key"] = ['required', 'boolean'];
            }
        }

        $validated = $request->validate($rules);

        foreach ($roles as $role) {
            $data = $validated['permisos'][$role];

            RolePermission::updateOrCreate(
                ['role' => $role],
                [
                    'manage_users' => (bool) $data['manage_users'],
                    'create_property' => (bool) $data['create_property'],
                    'edit_any_property' => (bool) $data['edit_any_property'],
                    'edit_own_property' => (bool) $data['edit_own_property'],
                    'delete_any_property' => (bool) $data['delete_any_property'],
                    'delete_own_property' => (bool) $data['delete_own_property'],
                ]
            );
        }

        return redirect()
            ->route('gerente.permisos')
            ->with('success', 'Permisos actualizados correctamente.');
    }
}
