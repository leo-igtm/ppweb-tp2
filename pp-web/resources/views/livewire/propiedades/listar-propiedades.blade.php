<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Propiedades</h2>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgente())
                        <a href="{{ route('propiedades.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Nueva Propiedad
                        </a>
                    @endif
                </div>

                    @if(session()->has('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Filtros -->
                    <div class="mb-6 grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="md:col-span-2">
                            <input type="text" wire:model.live.debounce.300ms="search" 
                                placeholder="Buscar por título, descripción, dirección..."
                                class="w-full text-black rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                                <select wire:model.live="filterTipo" 
                                    class="w-full text-black rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Todos los tipos</option>
                                <option value="casa">Casa</option>
                                <option value="departamento">Departamento</option>
                                <option value="terreno">Terreno</option>
                                <option value="local">Local</option>
                                <option value="oficina">Oficina</option>
                            </select>
                        </div>
                        <div>
                                <select wire:model.live="filterOperacion" 
                                    class="w-full text-black rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Todas las operaciones</option>
                                <option value="venta">Venta</option>
                                <option value="alquiler">Alquiler</option>
                            </select>
                        </div>
                        <div>
                                <select wire:model.live="filterDisponible" 
                                    class="w-full text-black rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Todas</option>
                                <option value="1">Disponibles</option>
                                <option value="0">No disponibles</option>
                            </select>
                        </div>
                    </div>

                    @if($search || $filterTipo || $filterOperacion || $filterDisponible !== '')
                        <div class="mb-4">
                            <button wire:click="limpiarFiltros" 
                                    class="text-sm text-blue-600 hover:text-blue-800">
                                Limpiar filtros
                            </button>
                        </div>
                    @endif

                    <!-- Tabla de Propiedades -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Imagen
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Título
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipo
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Operación
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ubicación
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($propiedades as $propiedad)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($propiedad->imagen)
                                                <img src="{{ Storage::url($propiedad->imagen) }}" 
                                                     alt="{{ $propiedad->titulo }}" 
                                                     class="h-16 w-16 object-cover rounded">
                                            @else
                                                <div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center">
                                                    <span class="text-gray-400 text-xs">Sin imagen</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $propiedad->titulo }}</div>
                                            <div class="text-sm text-gray-500">{{ Str::limit($propiedad->descripcion, 50) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ ucfirst($propiedad->tipo) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $propiedad->operacion === 'venta' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ ucfirst($propiedad->operacion) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            ${{ number_format($propiedad->precio, 2) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $propiedad->ciudad }}, {{ $propiedad->provincia }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($propiedad->disponible)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Disponible
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    No disponible
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('propiedades.show', $propiedad) }}" 
                                               class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                                            @if(auth()->user()->isAdmin() || (auth()->user()->isAgente() && $propiedad->agente_id == auth()->id()))
                                                <a href="{{ route('propiedades.edit', $propiedad) }}" 
                                                   class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                                <button wire:click="eliminar({{ $propiedad->id }})" 
                                                        wire:confirm="¿Estas seguro de eliminar esta propiedad?"
                                                        class="text-red-600 hover:text-red-900">Eliminar</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                            No se encontraron propiedades.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-6">
                        {{ $propiedades->links() }}
                    </div>
            </div>
        </div>
    </div>
</div>
