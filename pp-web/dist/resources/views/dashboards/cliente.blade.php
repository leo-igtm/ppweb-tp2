<x-layouts.app :title="__('Dashboard Cliente')">
    <div class="space-y-6">
        <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-900">
            <h1 class="text-2xl font-bold">Panel de Cliente</h1>
            <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-300">
                Puedes visualizar propiedades y sus detalles.
            </p>
        </div>

        <div class="grid gap-4 md:grid-cols-1">
            <a href="{{ route('propiedades.index') }}" class="rounded-xl border border-neutral-200 bg-white p-6 hover:border-blue-500 dark:border-neutral-700 dark:bg-neutral-900">
                <h2 class="font-semibold">Explorar propiedades</h2>
                <p class="mt-1 text-sm text-neutral-600 dark:text-neutral-300">Usa filtros y búsqueda para navegar el catálogo.</p>
            </a>
        </div>
    </div>
</x-layouts.app>
