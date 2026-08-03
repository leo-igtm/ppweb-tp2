import React from 'react';
import { Link } from '@inertiajs/react';
import AppLayout from '../../../Layouts/AppLayout';

export default function Estadisticas({ stats = {} }) {
    const cards = [
        { label: 'Total Propiedades', value: stats.total_propiedades ?? 0, color: 'bg-blue-500' },
        { label: 'Propiedades Disponibles', value: stats.propiedades_disponibles ?? 0, color: 'bg-green-500' },
        { label: 'Total Usuarios', value: stats.total_usuarios ?? 0, color: 'bg-purple-500' },
        { label: 'Agentes', value: stats.agentes ?? 0, color: 'bg-indigo-500' },
        { label: 'Clientes', value: stats.clientes ?? 0, color: 'bg-teal-500' },
    ];

    return (
        <AppLayout>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <div className="flex justify-between items-center mb-6">
                                <h1 className="text-2xl font-bold text-gray-800">Estadísticas</h1>
                                <Link
                                    href="/dashboard"
                                    className="text-indigo-600 hover:text-indigo-800"
                                >
                                    &larr; Volver al Dashboard
                                </Link>
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {cards.map((card, idx) => (
                                    <div key={idx} className="bg-gray-50 rounded-lg shadow p-6">
                                        <div className={`w-12 h-12 ${card.color} rounded-lg flex items-center justify-center mb-4`}>
                                            <span className="text-white text-xl font-bold">{card.value}</span>
                                        </div>
                                        <h3 className="text-lg font-semibold text-gray-800">{card.label}</h3>
                                        <p className="text-3xl font-bold text-gray-900 mt-2">{card.value}</p>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
