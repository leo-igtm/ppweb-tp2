<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropiedadController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Propiedades\ListarPropiedades;
use App\Livewire\Propiedades\CrearPropiedad;
use App\Livewire\Propiedades\VerPropiedad;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;


// Rutas públicas - Inertia
Route::get('/test', function () {
    return Inertia::render('Test');
})->name('test');

Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('propiedades', [HomeController::class, 'propiedades'])->name('propiedades.public');
Route::get('propiedades/{propiedad}', [HomeController::class, 'verPropiedad'])->name('propiedades.show.public');
Route::get('servicios', [HomeController::class, 'servicios'])->name('servicios');
Route::get('contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::post('contacto', [HomeController::class, 'enviarContacto'])->name('contacto.send');




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

// Rutas de administración - solo admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('dashboard/admin/estadisticas', [AdminController::class, 'estadisticas'])->name('admin.estadisticas');
});

// Dashboard de gerente
Route::middleware(['auth', 'role:gerente'])->group(function () {
    Route::get('dashboard/gerente', [GerenteController::class, 'dashboard'])->name('gerente.dashboard');
    Route::get('dashboard/gerente/permisos', [GerenteController::class, 'permisos'])->name('gerente.permisos');
    Route::patch('dashboard/gerente/permisos', [GerenteController::class, 'actualizarPermisos'])->name('gerente.permisos.update');
});

// Rutas de propiedades - admin, gerente y agentes pueden crear/editar
Route::middleware(['auth', 'role:admin,gerente,agente'])->group(function () {
    Route::get('dashboard/propiedades/crear/nueva', CrearPropiedad::class)->name('propiedades.create');
    Route::get('dashboard/propiedades/{propiedad}/editar', [PropiedadController::class, 'edit'])->name('propiedades.edit');
    Route::post('dashboard/propiedades', [PropiedadController::class, 'store'])->name('propiedades.store');
    Route::put('dashboard/propiedades/{propiedad}', [PropiedadController::class, 'update'])->name('propiedades.update');
});


Route::get('dashboard', function () {
    $user = Auth::user();
    if (!$user) {
        abort(403);
    }

    /** @var User $user */
    if ($user->isAdmin()) {
        return Inertia::render('Dashboard/Admin');
    }
    if ($user->isGerente()) {
        return redirect()->route('gerente.dashboard');
    }
    if ($user->isAgente()) {
        return Inertia::render('Dashboard/Agente');
    }
    if ($user->isCliente()) {
        return Inertia::render('Dashboard/Cliente');
    }

    abort(403, 'No tienes permiso para acceder al dashboard.');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
