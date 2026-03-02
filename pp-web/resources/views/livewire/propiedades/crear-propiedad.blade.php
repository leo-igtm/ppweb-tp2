<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Nueva Propiedad</h2>
                    <a href="{{ route('propiedades.index') }}" 
                       class="text-gray-600 hover:text-gray-900">
                        ← Volver al listado
                    </a>
                </div>

                    <form wire:submit="guardar" class="space-y-6">
                        <!-- Título -->
                        <div>
                            <label for="titulo" class="block text-sm font-medium text-gray-700">Título *</label>
                            <input type="text" wire:model="titulo" id="titulo" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('titulo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción *</label>
                            <textarea wire:model="descripcion" id="descripcion" rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            @error('descripcion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tipo y Operación -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo *</label>
                                <select wire:model="tipo" id="tipo"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Seleccionar...</option>
                                    <option value="casa">Casa</option>
                                    <option value="departamento">Departamento</option>
                                    <option value="terreno">Terreno</option>
                                    <option value="local">Local</option>
                                    <option value="oficina">Oficina</option>
                                </select>
                                @error('tipo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="operacion" class="block text-sm font-medium text-gray-700">Operación *</label>
                                <select wire:model="operacion" id="operacion"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Seleccionar...</option>
                                    <option value="venta">Venta</option>
                                    <option value="alquiler">Alquiler</option>
                                </select>
                                @error('operacion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio *</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" wire:model="precio" id="precio" step="0.01"
                                       class="pl-7 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            @error('precio') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Ubicación -->
                        <div class="space-y-4">
                            <div>
                                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección *</label>
                                <input type="text" wire:model="direccion" id="direccion"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('direccion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad *</label>
                                    <input type="text" wire:model="ciudad" id="ciudad"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('ciudad') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="provincia" class="block text-sm font-medium text-gray-700">Provincia *</label>
                                    <input type="text" wire:model="provincia" id="provincia"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('provincia') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Características -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="habitaciones" class="block text-sm font-medium text-gray-700">Habitaciones</label>
                                <input type="number" wire:model="habitaciones" id="habitaciones" min="0"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('habitaciones') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="banos" class="block text-sm font-medium text-gray-700">Baños</label>
                                <input type="number" wire:model="banos" id="banos" min="0"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('banos') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="superficie" class="block text-sm font-medium text-gray-700">Superficie (m²)</label>
                                <input type="number" wire:model="superficie" id="superficie" step="0.01" min="0"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                @error('superficie') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div>
                            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                            <input type="file" wire:model="imagen" id="imagen" accept="image/*"
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @error('imagen') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            
                            @if ($imagen)
                                <div class="mt-2">
                                    <img src="{{ $imagen->temporaryUrl() }}" class="h-32 w-32 object-cover rounded">
                                </div>
                            @endif
                        </div>

                        <!-- Disponible -->
                        <div class="flex items-center">
                            <input type="checkbox" wire:model="disponible" id="disponible"
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="disponible" class="ml-2 block text-sm text-gray-900">
                                Propiedad disponible
                            </label>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('propiedades.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Guardar Propiedad
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
