<div>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('propiedades.index') }}" class="text-blue-600 hover:text-blue-800">
                            ← Volver al listado
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Imagen -->
                        <div>
                            @if($propiedad->imagen)
                                <img src="{{ asset($propiedad->imagen) }}" 
                                     alt="{{ $propiedad->titulo }}" 
                                     class="w-full h-96 object-cover rounded-lg shadow-lg">
                            @else
                                <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400 text-2xl">Sin imagen</span>
                                </div>
                            @endif
                        </div>

                        <!-- Información principal -->
                        <div>
                            <div class="mb-4">
                                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                                    {{ $propiedad->operacion === 'venta' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                                    {{ ucfirst($propiedad->operacion) }}
                                </span>
                                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800 ml-2">
                                    {{ ucfirst($propiedad->tipo) }}
                                </span>
                                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full ml-2
                                    {{ $propiedad->disponible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $propiedad->disponible ? 'Disponible' : 'No disponible' }}
                                </span>
                            </div>

                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $propiedad->titulo }}</h1>
                            
                            <div class="text-4xl font-bold text-blue-600 mb-6">
                                ${{ number_format($propiedad->precio, 2) }}
                            </div>

                            <div class="space-y-4 mb-6">
                                <div class="flex items-center text-gray-700">
                                    <svg class="w-6 h-6 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ $propiedad->direccion }}, {{ $propiedad->ciudad }}, {{ $propiedad->provincia }}</span>
                                </div>

                                <div class="flex items-center space-x-6">
                                    @if($propiedad->habitaciones)
                                        <div class="flex items-center text-gray-700">
                                            <svg class="w-6 h-6 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                            <span>{{ $propiedad->habitaciones }} hab.</span>
                                        </div>
                                    @endif

                                    @if($propiedad->banos)
                                        <div class="flex items-center text-gray-700">
                                            <svg class="w-6 h-6 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                            </svg>
                                            <span>{{ $propiedad->banos }} baños</span>
                                        </div>
                                    @endif

                                    <div class="flex items-center text-gray-700">
                                        <svg class="w-6 h-6 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                        </svg>
                                        <span>{{ number_format($propiedad->superficie, 2) }} m²</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Agente -->
                            <div class="border-t pt-4">
                                <h3 class="text-sm font-semibold text-gray-500 mb-2">Agente responsable</h3>
                                <p class="text-lg text-gray-900">{{ $propiedad->agente->name }}</p>
                                <p class="text-sm text-gray-600">{{ $propiedad->agente->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Descripción completa -->
                    <div class="mt-8 border-t pt-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Descripción</h2>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $propiedad->descripcion }}</p>
                    </div>

                    <!-- Botones de acción -->
                    @if(auth()->user()->isAdmin() || (auth()->user()->isAgente() && $propiedad->agente_id === auth()->id()))
                        <div class="mt-8 border-t pt-6 flex space-x-4">
                            <a href="{{ route('propiedades.edit', $propiedad) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                                Editar Propiedad
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
