<x-layouts.app :title="__('Dashboard Admin')">
    <div class="space-y-6">
        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
            <h1 class="text-2xl font-bold">Panel de Administrador</h1>
            <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-300">
                Tienes acceso total al CRUD de propiedades.
            </p>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <a href="{{ route('propiedades.index') }}" class="rounded-xl border border-neutral-200 bg-white p-6 hover:border-blue-500 dark:border-neutral-700 dark:bg-neutral-900">
                <h2 class="font-semibold">Ver propiedades</h2>
                <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-300">Listado completo con filtros y acciones.</p>
            </a>
            <a href="{{ route('propiedades.create') }}" class="rounded-xl border border-neutral-200 bg-white p-6 hover:border-blue-500 dark:border-neutral-700 dark:bg-neutral-900">
                <h2 class="font-semibold">Crear propiedad</h2>
                <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-300">Alta de nuevas propiedades.</p>
            </a>
        </div>
    </div>
</x-layouts.app>
