<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Propiedades\ListarPropiedades;
use App\Livewire\Propiedades\CrearPropiedad;
use App\Livewire\Propiedades\EditarPropiedad;
use App\Livewire\Propiedades\VerPropiedad;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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
    Route::get('propiedades', ListarPropiedades::class)->name('propiedades.index');
    Route::get('propiedades/{propiedad}', VerPropiedad::class)->name('propiedades.show');
});

// Rutas de propiedades - solo admin y agentes pueden crear/editar
Route::middleware(['auth', 'role:admin,agente'])->group(function () {
    Route::get('propiedades/crear/nueva', CrearPropiedad::class)->name('propiedades.create');
    Route::get('propiedades/{propiedad}/editar', EditarPropiedad::class)->name('propiedades.edit');
});

require __DIR__.'/auth.php';
