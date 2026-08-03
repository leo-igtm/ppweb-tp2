<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function welcome()
    {
        $propiedades = Propiedad::where('disponible', true)->limit(3)->get();
        
        return Inertia::render('Welcome', [
            'propiedades' => $propiedades,
        ]);
    }

    public function propiedades()
    {
        $propiedades = Propiedad::where('disponible', true)->get();
        
        return Inertia::render('Propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public function servicios()
    {
        return Inertia::render('Servicios');
    }

    public function contacto()
    {
        return Inertia::render('Contacto');
    }

    public function enviarContacto()
    {
        $validated = request()->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string',
            'asunto' => 'required|string',
            'mensaje' => 'required|string|min:10',
        ]);

        Mail::raw($validated['mensaje'], function ($message) use ($validated) {
            $message->to('info@arkham.com')
                ->subject('Nuevo contacto: ' . $validated['asunto'])
                ->replyTo($validated['email'], $validated['nombre']);
        });

        return back()->with('success', 'Mensaje enviado correctamente');
    }

    public function verPropiedad(Propiedad $propiedad)
    {
        $propiedad->load('agente');
        
        return Inertia::render('VerPropiedad', [
            'propiedad' => $propiedad,
        ]);
    }
}
