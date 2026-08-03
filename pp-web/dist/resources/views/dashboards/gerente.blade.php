<x-layouts.app :title="__('Dashboard Gerente')">
    <div class="space-y-6">
        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
            <h1 class="text-2xl font-bold">Panel de Gerente</h1>
            <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-300">
                Puedes supervisar propiedades y revisar el catálogo general.
            </p>
        </div>

        <div class="grid gap-4 md:grid-cols-1">
            <a href="{{ route('propiedades.index') }}" class="rounded-xl border border-neutral-200 bg-white p-6 hover:border-blue-500 dark:border-neutral-700 dark:bg-neutral-900">
                <h2 class="font-semibold">Ver propiedades</h2>
                <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-300">Acceso al listado para seguimiento comercial.</p>
            </a>
        </div>
    </div>
</x-layouts.app>
