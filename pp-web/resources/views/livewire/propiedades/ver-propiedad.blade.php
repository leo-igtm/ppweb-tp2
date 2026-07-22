<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">{{ $propiedad->titulo }}</h2>
                    <a href="{{ route('propiedades.index') }}" 
                       class="text-gray-600 hover:text-gray-900">
                        ← Volver al listado
                    </a>
                </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Imagen -->
                        <div>
                            @if($propiedad->imagen)
                                <img src="{{ Storage::url($propiedad->imagen) }}" 
                                     alt="{{ $propiedad->titulo }}" 
                                     class="w-full h-96 object-cover rounded-lg shadow-lg">
                            @else
                                <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400 text-xl">Sin imagen</span>
                                </div>
                            @endif
                        </div>

                        <!-- Información Principal -->
                        <div class="space-y-6">
                            <!-- Precio -->
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <p class="text-sm text-gray-600 mb-1">Precio</p>
                                <p class="text-4xl font-bold text-blue-600">${{ number_format($propiedad->precio, 2) }}</p>
                                <p class="text-sm text-gray-600 mt-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        {{ $propiedad->operacion === 'venta' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                                        {{ ucfirst($propiedad->operacion) }}
                                    </span>
                                </p>
                            </div>

                            <!-- Tipo y Estado -->
                            <div class="flex space-x-4">
                                <div class="flex-1 bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-600 mb-1">Tipo</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ ucfirst($propiedad->tipo) }}</p>
                                </div>
                                <div class="flex-1 bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm text-gray-600 mb-1">Estado</p>
                                    <p class="text-lg font-semibold">
                                        @if($propiedad->disponible)
                                            <span class="text-green-600">Disponible</span>
                                        @else
                                            <span class="text-red-600">No disponible</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Características -->
                            @if($propiedad->habitaciones || $propiedad->banos || $propiedad->superficie)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-sm font-medium text-gray-600 mb-3">Características</p>
                                    <div class="grid grid-cols-3 gap-4">
                                        @if($propiedad->habitaciones)
                                            <div class="text-center">
                                                <p class="text-2xl font-bold text-gray-900">{{ $propiedad->habitaciones }}</p>
                                                <p class="text-xs text-gray-600">Habitaciones</p>
                                            </div>
                                        @endif
                                        @if($propiedad->banos)
                                            <div class="text-center">
                                                <p class="text-2xl font-bold text-gray-900">{{ $propiedad->banos }}</p>
                                                <p class="text-xs text-gray-600">Baños</p>
                                            </div>
                                        @endif
                                        @if($propiedad->superficie)
                                            <div class="text-center">
                                                <p class="text-2xl font-bold text-gray-900">{{ number_format($propiedad->superficie, 0) }}</p>
                                                <p class="text-xs text-gray-600">m²</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Acciones -->
                            @if(auth()->user()->isAdmin() || (auth()->user()->isAgente() && $propiedad->agente_id == auth()->id()))
                                <div class="flex space-x-3">
                                    <a href="{{ route('propiedades.edit', $propiedad) }}"
                                       class="flex-1 inline-flex justify-center items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Editar Propiedad
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Descripción</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $propiedad->descripcion }}</p>
                    </div>

                    <!-- Ubicación -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Ubicación</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700">
                                <span class="font-medium">Dirección:</span> {{ $propiedad->direccion }}
                            </p>
                            <p class="text-gray-700 mt-2">
                                <span class="font-medium">Ciudad:</span> {{ $propiedad->ciudad }}, {{ $propiedad->provincia }}
                            </p>
                        </div>
                    </div>

                    <!-- Agente -->
                    @if($propiedad->agente)
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Agente responsable</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-700">
                                    <span class="font-medium">Nombre:</span> {{ $propiedad->agente->name }}
                                </p>
                                <p class="text-gray-700 mt-2">
                                    <span class="font-medium">Email:</span> {{ $propiedad->agente->email }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Información adicional -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-500">
                            Publicado el {{ $propiedad->created_at->format('d/m/Y') }}
                        </p>
                    </div>
            </div>
        </div>
    </div>
</div>
