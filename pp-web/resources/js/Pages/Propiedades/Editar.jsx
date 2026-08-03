import AppLayout from '../../Layouts/AppLayout';
import { useForm } from '@inertiajs/react';
import { route } from 'ziggy-js';
import React from 'react';

export default function EditarPropiedad({ propiedad }) {
    const { data, setData, post, processing, errors } = useForm({
        titulo: propiedad.titulo || '',
        descripcion: propiedad.descripcion || '',
        tipo: propiedad.tipo || '',
        operacion: propiedad.operacion || '',
        precio: propiedad.precio || '',
        direccion: propiedad.direccion || '',
        ciudad: propiedad.ciudad || '',
        provincia: propiedad.provincia || '',
        habitaciones: propiedad.habitaciones || '',
        banos: propiedad.banos || '',
        superficie: propiedad.superficie || '',
        disponible: propiedad.disponible,
        imagen: null,
        _method: 'PUT', // Campo para simular un método PUT
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        // Inertia recomienda usar POST para subida de archivos incluso en updates.
        post(route('propiedades.update', propiedad.id), {
            forceFormData: true, // Forzar multipart/form-data para la imagen
        });
    };

    return (
        <AppLayout>
            <div className="py-12">
                <div className="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-8 bg-white border-b border-gray-200">
                            <h1 className="text-3xl font-bold text-gray-800 mb-6">Editar Propiedad</h1>

                            <form onSubmit={handleSubmit}>
                                {/* Título */}
                                <div className="mb-4">
                                    <label htmlFor="titulo" className="block text-sm font-medium text-gray-700">Título</label>
                                    <input
                                        type="text"
                                        id="titulo"
                                        value={data.titulo}
                                        onChange={(e) => setData('titulo', e.target.value)}
                                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                        required
                                    />
                                    {errors.titulo && <p className="text-red-500 text-xs mt-1">{errors.titulo}</p>}
                                </div>

                                {/* Descripción */}
                                <div className="mb-4">
                                    <label htmlFor="descripcion" className="block text-sm font-medium text-gray-700">Descripción</label>
                                    <textarea
                                        id="descripcion"
                                        value={data.descripcion}
                                        onChange={(e) => setData('descripcion', e.target.value)}
                                        rows="4"
                                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                        required
                                    ></textarea>
                                    {errors.descripcion && <p className="text-red-500 text-xs mt-1">{errors.descripcion}</p>}
                                </div>

                                {/* Tipo y Operación */}
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                    <div>
                                        <label htmlFor="tipo" className="block text-sm font-medium text-gray-700">Tipo</label>
                                        <select id="tipo" value={data.tipo} onChange={(e) => setData('tipo', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                            <option value="">Selecciona un tipo</option>
                                            <option value="casa">Casa</option>
                                            <option value="departamento">Departamento</option>
                                            <option value="local">Local Comercial</option>
                                            <option value="terreno">Terreno</option>
                                        </select>
                                        {errors.tipo && <p className="text-red-500 text-xs mt-1">{errors.tipo}</p>}
                                    </div>
                                    <div>
                                        <label htmlFor="operacion" className="block text-sm font-medium text-gray-700">Operación</label>
                                        <select id="operacion" value={data.operacion} onChange={(e) => setData('operacion', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                            <option value="">Selecciona una operación</option>
                                            <option value="venta">Venta</option>
                                            <option value="alquiler">Alquiler</option>
                                        </select>
                                        {errors.operacion && <p className="text-red-500 text-xs mt-1">{errors.operacion}</p>}
                                    </div>
                                </div>
                                
                                {/* Precio */}
                                <div className="mb-4">
                                    <label htmlFor="precio" className="block text-sm font-medium text-gray-700">Precio (USD)</label>
                                    <input type="number" id="precio" value={data.precio} onChange={(e) => setData('precio', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required min="0" />
                                    {errors.precio && <p className="text-red-500 text-xs mt-1">{errors.precio}</p>}
                                </div>

                                {/* Dirección, Ciudad y Provincia */}
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                    <div>
                                        <label htmlFor="direccion" className="block text-sm font-medium text-gray-700">Dirección</label>
                                        <input type="text" id="direccion" value={data.direccion} onChange={(e) => setData('direccion', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                                        {errors.direccion && <p className="text-red-500 text-xs mt-1">{errors.direccion}</p>}
                                    </div>
                                    <div>
                                        <label htmlFor="ciudad" className="block text-sm font-medium text-gray-700">Ciudad</label>
                                        <input type="text" id="ciudad" value={data.ciudad} onChange={(e) => setData('ciudad', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                                        {errors.ciudad && <p className="text-red-500 text-xs mt-1">{errors.ciudad}</p>}
                                    </div>
                                </div>

                                {/* Habitaciones, Baños y Superficie */}
                                <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                                    <div>
                                        <label htmlFor="habitaciones" className="block text-sm font-medium text-gray-700">Habitaciones</label>
                                        <input type="number" id="habitaciones" value={data.habitaciones} onChange={(e) => setData('habitaciones', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="0" />
                                        {errors.habitaciones && <p className="text-red-500 text-xs mt-1">{errors.habitaciones}</p>}
                                    </div>
                                    <div>
                                        <label htmlFor="banos" className="block text-sm font-medium text-gray-700">Baños</label>
                                        <input type="number" id="banos" value={data.banos} onChange={(e) => setData('banos', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="0" />
                                        {errors.banos && <p className="text-red-500 text-xs mt-1">{errors.banos}</p>}
                                    </div>
                                    <div>
                                        <label htmlFor="superficie" className="block text-sm font-medium text-gray-700">Superficie (m²)</label>
                                        <input type="number" id="superficie" value={data.superficie} onChange={(e) => setData('superficie', e.target.value)} className="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="0" />
                                        {errors.superficie && <p className="text-red-500 text-xs mt-1">{errors.superficie}</p>}
                                    </div>
                                </div>

                                {/* Imagen */}
                                <div className="mb-4">
                                    <label className="block text-sm font-medium text-gray-700">Imagen Principal</label>
                                    {propiedad.imagen_url && !data.imagen && (
                                        <div className="mt-2">
                                            <p className="text-sm text-gray-600">Imagen actual:</p>
                                            <img src={propiedad.imagen_url} alt="Imagen actual" className="w-40 h-auto rounded-md mt-1" />
                                        </div>
                                    )}
                                    <input
                                        type="file"
                                        id="imagen"
                                        onChange={(e) => setData('imagen', e.target.files[0])}
                                        className="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                    />
                                    <p className="text-xs text-gray-500 mt-1">Sube una nueva imagen para reemplazar la actual.</p>
                                    {errors.imagen && <p className="text-red-500 text-xs mt-1">{errors.imagen}</p>}
                                </div>

                                {/* Disponible */}
                                <div className="flex items-center mb-6">
                                    <input
                                        type="checkbox"
                                        id="disponible"
                                        checked={data.disponible}
                                        onChange={(e) => setData('disponible', e.target.checked)}
                                        className="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                    />
                                    <label htmlFor="disponible" className="ml-2 block text-sm text-gray-900">Disponible</label>
                                </div>

                                {/* Botón de envío */}
                                <div className="flex items-center justify-end">
                                    <button
                                        type="submit"
                                        disabled={processing}
                                        className="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 disabled:opacity-50"
                                    >
                                        {processing ? 'Actualizando...' : 'Actualizar Propiedad'}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
