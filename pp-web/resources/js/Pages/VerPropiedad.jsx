import { Link } from '@inertiajs/react';
import AppLayout from '../Layouts/AppLayout';

export default function VerPropiedad({ propiedad = null }) {
    if (!propiedad) {
        return (
            <AppLayout>
                <div className="max-w-7xl mx-auto px-4 py-12">
                    <p className="text-center text-gray-600">Propiedad no encontrada</p>
                </div>
            </AppLayout>
        );
    }

    return (
        <AppLayout>
            <div className="max-w-7xl mx-auto px-4 py-12">
                <Link href="/propiedades" className="text-indigo-600 hover:text-indigo-900 mb-6">
                    ← Volver a Propiedades
                </Link>

                <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {/* Imagen */}
                    <div>
                        <div className="bg-gray-300 h-96 rounded-lg flex items-center justify-center">
                            <span className="text-gray-500 text-xl">Imagen de propiedad</span>
                        </div>
                    </div>

                    {/* Detalles */}
                    <div>
                        <h1 className="text-4xl font-bold mb-4">{propiedad.titulo}</h1>

                        <div className="bg-indigo-50 p-4 rounded-lg mb-6">
                            <p className="text-3xl font-bold text-indigo-600">
                                ${parseFloat(propiedad.precio).toLocaleString()}
                            </p>
                            <p className="text-gray-600">
                                {propiedad.operacion === 'venta' ? 'Venta' : 'Alquiler'}
                            </p>
                        </div>

                        <div className="grid grid-cols-2 gap-4 mb-6">
                            <div className="bg-gray-100 p-4 rounded-lg">
                                <p className="text-gray-600 text-sm">Tipo de Propiedad</p>
                                <p className="text-lg font-bold text-gray-900">
                                    {propiedad.tipo}
                                </p>
                            </div>
                            <div className="bg-gray-100 p-4 rounded-lg">
                                <p className="text-gray-600 text-sm">Operación</p>
                                <p className="text-lg font-bold text-gray-900">
                                    {propiedad.operacion}
                                </p>
                            </div>
                            {propiedad.habitaciones > 0 && (
                                <div className="bg-gray-100 p-4 rounded-lg">
                                    <p className="text-gray-600 text-sm">Habitaciones</p>
                                    <p className="text-lg font-bold text-gray-900">
                                        {propiedad.habitaciones}
                                    </p>
                                </div>
                            )}
                            {propiedad.banos > 0 && (
                                <div className="bg-gray-100 p-4 rounded-lg">
                                    <p className="text-gray-600 text-sm">Baños</p>
                                    <p className="text-lg font-bold text-gray-900">
                                        {propiedad.banos}
                                    </p>
                                </div>
                            )}
                            {propiedad.superficie > 0 && (
                                <div className="bg-gray-100 p-4 rounded-lg">
                                    <p className="text-gray-600 text-sm">Superficie</p>
                                    <p className="text-lg font-bold text-gray-900">
                                        {propiedad.superficie} m²
                                    </p>
                                </div>
                            )}
                            <div className="bg-gray-100 p-4 rounded-lg">
                                <p className="text-gray-600 text-sm">Ubicación</p>
                                <p className="text-lg font-bold text-gray-900">
                                    {propiedad.ciudad}
                                </p>
                            </div>
                        </div>

                        <div className="mb-6">
                            <h3 className="text-2xl font-bold mb-2">Descripción</h3>
                            <p className="text-gray-700 leading-relaxed">{propiedad.descripcion}</p>
                        </div>

                        {propiedad.direccion && (
                            <div className="mb-6">
                                <h3 className="text-lg font-bold mb-2">Dirección</h3>
                                <p className="text-gray-700">{propiedad.direccion}</p>
                            </div>
                        )}

                        {propiedad.agente && (
                            <div className="bg-indigo-50 p-6 rounded-lg">
                                <h3 className="text-lg font-bold mb-4">Agente Responsable</h3>
                                <div className="flex items-center gap-4">
                                    <div className="w-12 h-12 bg-indigo-200 rounded-full flex items-center justify-center">
                                        <span className="font-bold text-indigo-700">
                                            {propiedad.agente.name
                                                .split(' ')
                                                .map((n) => n[0])
                                                .join('')}
                                        </span>
                                    </div>
                                    <div>
                                        <p className="font-bold text-gray-900">
                                            {propiedad.agente.name}
                                        </p>
                                        <p className="text-gray-600">{propiedad.agente.email}</p>
                                    </div>
                                </div>
                            </div>
                        )}

                        <div className="flex gap-4 mt-8">
                            <Link
                                href="/contacto"
                                className="flex-1 bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 text-center"
                            >
                                Más Información
                            </Link>
                            <button className="flex-1 border border-indigo-600 text-indigo-600 py-3 rounded-lg font-bold hover:bg-indigo-50">
                                Compartir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
