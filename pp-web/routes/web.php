<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Propiedades\ListarPropiedades;
use App\Livewire\Propiedades\CrearPropiedad;
use App\Livewire\Propiedades\EditarPropiedad;
use App\Livewire\Propiedades\VerPropiedad;
use Illuminate\Support\Facades\Route;

// Rutas públicas - Inertia
Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('propiedades', [HomeController::class, 'propiedades'])->name('propiedades.public');
Route::get('propiedades/{propiedad}', [HomeController::class, 'verPropiedad'])->name('propiedades.show.public');
Route::get('servicios', [HomeController::class, 'servicios'])->name('servicios');
Route::get('contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::post('contacto', [HomeController::class, 'enviarContacto'])->name('contacto.send');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Rutas de propiedades - todos los usuarios autenticados pueden ver
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/propiedades', ListarPropiedades::class)->name('propiedades.index');
    Route::get('dashboard/propiedades/{propiedad}', VerPropiedad::class)->name('propiedades.show');
});

// Rutas de propiedades - solo admin y agentes pueden crear/editar
Route::middleware(['auth', 'role:admin,agente'])->group(function () {
    Route::get('dashboard/propiedades/crear/nueva', CrearPropiedad::class)->name('propiedades.create');
    Route::get('dashboard/propiedades/{propiedad}/editar', EditarPropiedad::class)->name('propiedades.edit');
});

require __DIR__.'/auth.php';
