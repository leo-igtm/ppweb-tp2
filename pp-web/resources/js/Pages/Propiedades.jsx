import React, { useState, useMemo } from 'react';
import { Link } from '@inertiajs/react';
import AppLayout from '../Layouts/AppLayout';

export default function Propiedades({ propiedades = [] }) {
    const [filtros, setFiltros] = useState({
        busqueda: '',
        tipo: '',
        operacion: '',
        ciudad: '',
    });

    const propiedadesFiltered = useMemo(() => {
        return propiedades.filter((prop) => {
            const matchBusqueda =
                prop.titulo.toLowerCase().includes(filtros.busqueda.toLowerCase()) ||
                prop.descripcion.toLowerCase().includes(filtros.busqueda.toLowerCase());

            const matchTipo = !filtros.tipo || prop.tipo === filtros.tipo;
            const matchOperacion = !filtros.operacion || prop.operacion === filtros.operacion;
            const matchCiudad = !filtros.ciudad || prop.ciudad === filtros.ciudad;

            return matchBusqueda && matchTipo && matchOperacion && matchCiudad;
        });
    }, [propiedades, filtros]);

    return (
        <AppLayout>
            <div className="max-w-7xl mx-auto px-4 py-12">
                <h1 className="text-4xl font-bold mb-8">Propiedades Disponibles</h1>

                {/* Filtros */}
                <div className="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 className="text-2xl font-bold mb-4">Filtros</h2>
                    <div className="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <input
                            type="text"
                            placeholder="Buscar por título o descripción"
                            value={filtros.busqueda}
                            onChange={(e) =>
                                setFiltros({ ...filtros, busqueda: e.target.value })
                            }
                            className="border border-gray-300 px-4 py-2 rounded text-black"
                        />
                        <select
                            value={filtros.tipo}
                            onChange={(e) => setFiltros({ ...filtros, tipo: e.target.value })}
                            className="border border-gray-300 px-4 py-2 rounded text-black"
                        >
                            <option value="">Todos los tipos</option>
                            <option value="casa">Casa</option>
                            <option value="apartamento">Apartamento</option>
                            <option value="terreno">Terreno</option>
                        </select>
                        <select
                            value={filtros.operacion}
                            onChange={(e) =>
                                setFiltros({ ...filtros, operacion: e.target.value })
                            }
                            className="border border-gray-300 px-4 py-2 rounded text-black"
                        >
                            <option value="">Todas las operaciones</option>
                            <option value="venta">Venta</option>
                            <option value="alquiler">Alquiler</option>
                        </select>
                        <select
                            value={filtros.ciudad}
                            onChange={(e) => setFiltros({ ...filtros, ciudad: e.target.value })}
                            className="border border-gray-300 px-4 py-2 rounded text-black"
                        >
                            <option value="">Todas las ciudades</option>
                            <option value="San Salvador">San Salvador</option>
                            <option value="Santa Ana">Santa Ana</option>
                            <option value="San Miguel">San Miguel</option>
                            <option value="La Unión">La Unión</option>
                        </select>
                    </div>
                </div>

                {/* Lista de Propiedades */}
                {propiedadesFiltered.length > 0 ? (
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {propiedadesFiltered.map((propiedad) => (
                            <div
                                key={propiedad.id}
                                className="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow"
                            >
                                <div className="bg-gray-300 h-40 flex items-center justify-center">
                                    <span className="text-gray-500">Imagen de propiedad</span>
                                </div>
                                <div className="p-6">
                                    <h3 className="text-lg font-bold text-gray-900 mb-2">
                                        {propiedad.titulo}
                                    </h3>
                                    <p className="text-gray-600 text-sm mb-2">
                                        {propiedad.ciudad}
                                    </p>
                                    <p className="text-2xl font-bold text-indigo-600 mb-4">
                                        ${propiedad.precio.toLocaleString()}
                                    </p>
                                    <div className="flex gap-4 text-sm text-gray-700 mb-4">
                                        {propiedad.habitaciones > 0 && (
                                            <span>🛏️ {propiedad.habitaciones}</span>
                                        )}
                                        {propiedad.banos > 0 && (
                                            <span>🚿 {propiedad.banos}</span>
                                        )}
                                        <span className="bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                            {propiedad.tipo}
                                        </span>
                                    </div>
                                    <Link
                                        href={`/propiedades/${propiedad.id}`}
                                        className="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 block text-center"
                                    >
                                        Ver Detalle
                                    </Link>
                                </div>
                            </div>
                        ))}
                    </div>
                ) : (
                    <div className="text-center py-12">
                        <p className="text-gray-600 text-lg">
                            No se encontraron propiedades que coincidan con los filtros.
                        </p>
                    </div>
                )}
            </div>
        </AppLayout>
    );
}
