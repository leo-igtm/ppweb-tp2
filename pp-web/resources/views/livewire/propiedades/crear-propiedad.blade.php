<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <a href="{{ route('propiedades.index') }}" class="text-blue-600 hover:text-blue-800">
                            ← Volver al listado
                        </a>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear Nueva Propiedad</h2>

                    <form wire:submit="save">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Título -->
                            <div class="col-span-2">
                                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                                    Título *
                                </label>
                                <input type="text" 
                                       id="titulo" 
                                       wire:model="titulo" 
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Ej: Casa moderna en zona residencial">
                                @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="col-span-2">
                                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                                    Descripción *
                                </label>
                                <textarea id="descripcion" 
                                          wire:model="descripcion" 
                                          rows="4"
                                          class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                          placeholder="Describe la propiedad en detalle..."></textarea>
                                @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Tipo -->
                            <div>
                                <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tipo de Propiedad *
                                </label>
                                <select id="tipo" 
                                        wire:model="tipo" 
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                    <option value="casa">Casa</option>
                                    <option value="departamento">Departamento</option>
                                    <option value="terreno">Terreno</option>
                                    <option value="local">Local</option>
                                    <option value="oficina">Oficina</option>
                                </select>
                                @error('tipo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Operación -->
                            <div>
                                <label for="operacion" class="block text-sm font-medium text-gray-700 mb-2">
                                    Operación *
                                </label>
                                <select id="operacion" 
                                        wire:model="operacion" 
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                    <option value="venta">Venta</option>
                                    <option value="alquiler">Alquiler</option>
                                </select>
                                @error('operacion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Precio -->
                            <div>
                                <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">
                                    Precio *
                                </label>
                                <input type="number" 
                                       id="precio" 
                                       wire:model="precio" 
                                       step="0.01"
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="0.00">
                                @error('precio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Superficie -->
                            <div>
                                <label for="superficie" class="block text-sm font-medium text-gray-700 mb-2">
                                    Superficie (m²) *
                                </label>
                                <input type="number" 
                                       id="superficie" 
                                       wire:model="superficie" 
                                       step="0.01"
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="0.00">
                                @error('superficie') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Habitaciones -->
                            <div>
                                <label for="habitaciones" class="block text-sm font-medium text-gray-700 mb-2">
                                    Habitaciones
                                </label>
                                <input type="number" 
                                       id="habitaciones" 
                                       wire:model="habitaciones" 
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="0">
                                @error('habitaciones') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Baños -->
                            <div>
                                <label for="banos" class="block text-sm font-medium text-gray-700 mb-2">
                                    Baños
                                </label>
                                <input type="number" 
                                       id="banos" 
                                       wire:model="banos" 
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="0">
                                @error('banos') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Dirección -->
                            <div class="col-span-2">
                                <label for="direccion" class="block text-sm font-medium text-gray-700 mb-2">
                                    Dirección *
                                </label>
                                <input type="text" 
                                       id="direccion" 
                                       wire:model="direccion" 
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Calle y número">
                                @error('direccion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Ciudad -->
                            <div>
                                <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-2">
                                    Ciudad *
                                </label>
                                <input type="text" 
                                       id="ciudad" 
                                       wire:model="ciudad" 
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Ciudad">
                                @error('ciudad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Provincia -->
                            <div>
                                <label for="provincia" class="block text-sm font-medium text-gray-700 mb-2">
                                    Provincia *
                                </label>
                                <input type="text" 
                                       id="provincia" 
                                       wire:model="provincia" 
                                       class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                       placeholder="Provincia">
                                @error('provincia') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Agente -->
                            @if(auth()->user()->isAdmin())
                                <div>
                                    <label for="agente_id" class="block text-sm font-medium text-gray-700 mb-2">
                                        Agente *
                                    </label>
                                    <select id="agente_id" 
                                            wire:model="agente_id" 
                                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                        <option value="">Seleccione un agente</option>
                                        @foreach($agentes as $agente)
                                            <option value="{{ $agente->id }}">{{ $agente->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('agente_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            @endif

                            <!-- Disponible -->
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                           wire:model="disponible" 
                                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Disponible</span>
                                </label>
                            </div>

                            <!-- Imagen -->
                            <div class="col-span-2">
                                <label for="imagen" class="block text-sm font-medium text-gray-700 mb-2">
                                    Imagen
                                </label>
                                <input type="file" 
                                       id="imagen" 
                                       wire:model="imagen" 
                                       accept="image/*"
                                       class="w-full">
                                @error('imagen') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                
                                @if ($imagen)
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600">Vista previa:</p>
                                        <img src="{{ $imagen->temporaryUrl() }}" class="mt-2 h-32 rounded">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('propiedades.index') }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-200">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                                Crear Propiedad
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
