<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PropiedadController extends Controller
{
    public function edit(Propiedad $propiedad)
    {
        $user = Auth::user();
        if (! $user) {
            abort(403);
        }

        if (!in_array($user->role, ['admin', 'gerente']) && $propiedad->agente_id !== $user->id) {
            abort(403, 'No tienes permiso para editar esta propiedad.');
        }

        return Inertia::render('Propiedades/Editar', [
            'propiedad' => $propiedad,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|max:100',
            'operacion' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'provincia' => 'nullable|string|max:100',
            'habitaciones' => 'nullable|integer|min:0',
            'banos' => 'nullable|integer|min:0',
            'superficie' => 'nullable|numeric|min:0',
            'disponible' => 'boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $validated['agente_id'] = Auth::id();
        $validated['disponible'] = $request->boolean('disponible');

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('propiedades', 'public');
        }

        Propiedad::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Propiedad creada exitosamente.');
    }

    public function update(Request $request, Propiedad $propiedad)
    {
        $user = Auth::user();
        if (!in_array($user->role, ['admin', 'gerente']) && $propiedad->agente_id !== $user->id) {
            abort(403, 'No tienes permiso para editar esta propiedad.');
        }

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string|max:100',
            'operacion' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'provincia' => 'nullable|string|max:100',
            'habitaciones' => 'nullable|integer|min:0',
            'banos' => 'nullable|integer|min:0',
            'superficie' => 'nullable|numeric|min:0',
            'disponible' => 'boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $validated['disponible'] = $request->boolean('disponible');

        if ($request->hasFile('imagen')) {
            if ($propiedad->imagen) {
                Storage::disk('public')->delete($propiedad->imagen);
            }
            $validated['imagen'] = $request->file('imagen')->store('propiedades', 'public');
        }

        $propiedad->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Propiedad actualizada exitosamente.');
    }
}
