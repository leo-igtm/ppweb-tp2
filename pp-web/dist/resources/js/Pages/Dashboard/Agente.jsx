import React from 'react';
import { Link, usePage } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Agente() {
    const { auth } = usePage().props;
    const permissions = auth?.user?.permissions ?? {};
    const propertyCount = auth?.user?.properties_count ?? 0;

    return (
        <AppLayout>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <h1 className="text-2xl font-bold text-gray-800">Panel de Agente</h1>
                            <p className="mt-2 text-gray-600">
                                ¡Hola, {auth?.user?.name}! Aquí puedes gestionar tus propiedades.
                            </p>

                            <div className="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div className="bg-blue-50 rounded-lg shadow p-6">
                                    <h2 className="text-xl font-bold text-blue-800">Mis Propiedades</h2>
                                    <p className="mt-2 text-gray-600">
                                        Actualmente tienes <span className="font-bold">{propertyCount}</span> propiedades publicadas.
                                    </p>
                                    <Link href="/dashboard/propiedades" className="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Ver Mis Propiedades
                                    </Link>
                                </div>

                                {permissions.create_property && (
                                    <div className="bg-green-50 rounded-lg shadow p-6">
                                        <h2 className="text-xl font-bold text-green-800">Añadir Nueva Propiedad</h2>
                                        <p className="mt-2 text-gray-600">
                                            Publica una nueva casa, departamento o local para que miles de personas lo vean.
                                        </p>
                                        <Link href="/dashboard/propiedades/crear/nueva" className="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                            Crear Propiedad
                                        </Link>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
