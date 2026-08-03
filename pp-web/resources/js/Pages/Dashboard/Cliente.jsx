import React from 'react';
import { Link, usePage } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Cliente() {
    const { auth } = usePage().props;

    return (
        <AppLayout>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <h1 className="text-2xl font-bold text-gray-800">Portal del Cliente</h1>
                            <p className="mt-2 text-gray-600">
                                ¡Bienvenido de nuevo, {auth?.user?.name}! Explora las mejores propiedades que tenemos para ti.
                            </p>

                            <div className="mt-8">
                                <div className="bg-gray-50 rounded-lg shadow p-6">
                                    <h2 className="text-xl font-bold">Explorar Propiedades</h2>
                                    <p className="mt-2 text-gray-600">
                                        Filtra, busca y encuentra la casa o departamento de tus sueños.
                                    </p>
                                    <Link href="/dashboard/propiedades" className="mt-4 inline-block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                                        Ver Todas las Propiedades
                                    </Link>
                                </div>
                            </div>

                            <div className="mt-8">
                                <h2 className="text-xl font-semibold text-gray-700">Mis Favoritos</h2>
                                <p className="mt-2 text-gray-500">
                                    Aún no has guardado ninguna propiedad como favorita. ¡Empieza a explorar!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
