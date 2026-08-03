import React from 'react';
import { Link, usePage } from '@inertiajs/react';
import { route } from 'ziggy-js';
import AppLayout from '../../Layouts/AppLayout';

export default function Gerente({ propiedades = [], agentes = [], stats = {} }) {
    const { auth } = usePage().props;

    const statCards = [
        { label: 'Total Propiedades', value: stats.total_propiedades ?? 0, color: 'bg-blue-500' },
        { label: 'Disponibles', value: stats.disponibles ?? 0, color: 'bg-green-500' },
        { label: 'No Disponibles', value: stats.vendidas ?? 0, color: 'bg-red-500' },
        { label: 'Agentes', value: stats.total_agentes ?? 0, color: 'bg-purple-500' },
        { label: 'Clientes', value: stats.total_clientes ?? 0, color: 'bg-teal-500' },
    ];

    return (
        <AppLayout>
            <div className="py-8">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center mb-8">
                        <div>
                            <h1 className="text-3xl font-bold text-gray-900">Panel Gerente</h1>
                            <p className="text-gray-600 mt-1">Bienvenido, {auth?.user?.name}. Gestión completa del sistema.</p>
                        </div>
                        <Link
                            href={route('propiedades.create')}
                            className="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 font-semibold"
                        >
                            + Nueva Propiedad
                        </Link>
                    </div>

                    {/* Stats */}
                    <div className="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
                        {statCards.map((card, idx) => (
                            <div key={idx} className="bg-white rounded-lg shadow p-5">
                                <div className={`w-10 h-10 ${card.color} rounded-lg flex items-center justify-center mb-3`}>
                                    <span className="text-white font-bold text-lg">{card.value}</span>
                                </div>
                                <p className="text-sm font-medium text-gray-600">{card.label}</p>
                                <p className="text-2xl font-bold text-gray-900">{card.value}</p>
                            </div>
                        ))}
                    </div>

                    {/* Charts Row */}
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <div className="bg-white rounded-lg shadow p-6">
                            <h2 className="text-lg font-bold text-gray-800 mb-4">Propiedades por Tipo</h2>
                            <div className="space-y-3">
                                {Object.entries(stats.por_tipo ?? {}).map(([tipo, total]) => (
                                    <div key={tipo} className="flex items-center justify-between">
                                        <span className="text-gray-700 capitalize">{tipo}</span>
                                        <div className="flex items-center gap-3">
                                            <div className="w-32 bg-gray-200 rounded-full h-2.5">
                                                <div
                                                    className="bg-indigo-600 h-2.5 rounded-full"
                                                    style={{ width: `${(total / (stats.total_propiedades || 1)) * 100}%` }}
                                                ></div>
                                            </div>
                                            <span className="text-sm font-semibold text-gray-700">{total}</span>
                                        </div>
                                    </div>
                                ))}
                                {Object.keys(stats.por_tipo ?? {}).length === 0 && (
                                    <p className="text-gray-500 text-sm">Sin datos</p>
                                )}
                            </div>
                        </div>
                        <div className="bg-white rounded-lg shadow p-6">
                            <h2 className="text-lg font-bold text-gray-800 mb-4">Propiedades por Ciudad</h2>
                            <div className="space-y-3">
                                {Object.entries(stats.por_ciudad ?? {}).map(([ciudad, total]) => (
                                    <div key={ciudad} className="flex items-center justify-between">
                                        <span className="text-gray-700">{ciudad}</span>
                                        <div className="flex items-center gap-3">
                                            <div className="w-32 bg-gray-200 rounded-full h-2.5">
                                                <div
                                                    className="bg-green-500 h-2.5 rounded-full"
                                                    style={{ width: `${(total / (stats.total_propiedades || 1)) * 100}%` }}
                                                ></div>
                                            </div>
                                            <span className="text-sm font-semibold text-gray-700">{total}</span>
                                        </div>
                                    </div>
                                ))}
                                {Object.keys(stats.por_ciudad ?? {}).length === 0 && (
                                    <p className="text-gray-500 text-sm">Sin datos</p>
                                )}
                            </div>
                        </div>
                    </div>

                    {/* Propiedades */}
                    <div className="bg-white rounded-lg shadow mb-8">
                        <div className="p-6 border-b border-gray-200">
                            <h2 className="text-xl font-bold text-gray-800">Todas las Propiedades</h2>
                        </div>
                        <div className="overflow-x-auto">
                            <table className="min-w-full divide-y divide-gray-200">
                                <thead className="bg-gray-50">
                                    <tr>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Operación</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Precio</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ciudad</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Agente</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-gray-200">
                                    {propiedades.map((p) => (
                                        <tr key={p.id} className="hover:bg-gray-50">
                                            <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{p.titulo}</td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-600 capitalize">{p.tipo}</td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-600 capitalize">{p.operacion}</td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">${parseFloat(p.precio).toLocaleString()}</td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{p.ciudad}</td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{p.agente ?? '-'}</td>
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <span className={`px-2 py-1 text-xs font-semibold rounded-full ${
                                                    p.disponible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                                                }`}>
                                                    {p.disponible ? 'Disponible' : 'No disponible'}
                                                </span>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm">
                                                <div className="flex gap-2">
                                                    <Link href={`/propiedades/${p.id}`} className="text-blue-600 hover:text-blue-800">Ver</Link>
                                                    <Link href={route('propiedades.edit', p.id)} className="text-indigo-600 hover:text-indigo-800">Editar</Link>
                                                </div>
                                            </td>
                                        </tr>
                                    ))}
                                    {propiedades.length === 0 && (
                                        <tr>
                                            <td colSpan="8" className="px-6 py-8 text-center text-gray-500">
                                                No hay propiedades registradas.
                                            </td>
                                        </tr>
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {/* Staff */}
                    <div className="bg-white rounded-lg shadow">
                        <div className="p-6 border-b border-gray-200">
                            <h2 className="text-xl font-bold text-gray-800">Equipo de Agentes</h2>
                        </div>
                        <div className="overflow-x-auto">
                            <table className="min-w-full divide-y divide-gray-200">
                                <thead className="bg-gray-50">
                                    <tr>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Propiedades</th>
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-gray-200">
                                    {agentes.map((a) => (
                                        <tr key={a.id} className="hover:bg-gray-50">
                                            <td className="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{a.name}</td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{a.email}</td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                <span className="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-xs font-semibold">
                                                    {a.propiedades_count} propiedades
                                                </span>
                                            </td>
                                        </tr>
                                    ))}
                                    {agentes.length === 0 && (
                                        <tr>
                                            <td colSpan="3" className="px-6 py-8 text-center text-gray-500">
                                                No hay agentes registrados.
                                            </td>
                                        </tr>
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div className="mt-8 flex justify-end">
                        <Link
                            href={route('gerente.permisos')}
                            className="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-900 font-semibold"
                        >
                            Ver permisos por rol
                        </Link>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
