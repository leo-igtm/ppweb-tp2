<x-layouts.app :title="__('Dashboard')">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                        Bienvenido, {{ auth()->user()->name }}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Rol: <span class="font-semibold">{{ ucfirst(auth()->user()->role) }}</span>
                    </p>

                    <div class="mt-6">
                        <a href="{{ route('propiedades.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Ver Propiedades
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

