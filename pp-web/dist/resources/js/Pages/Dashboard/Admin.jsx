import AppLayout from '../../Layouts/AppLayout';
import React from 'react';
import { Link, usePage } from '@inertiajs/react';

export default function AdminDashboard() {
    const { auth } = usePage().props;

    return (
        <AppLayout>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <h1 className="text-2xl font-bold text-gray-800">Panel de Administrador</h1>
                            <p className="mt-2 text-gray-600">
                                ¡Bienvenido, {auth?.user?.name}! Desde aquí puedes gestionar todo el sistema.
                            </p>

                            <div className="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div className="bg-gray-50 rounded-lg shadow p-6">
                                    <h2 className="text-xl font-bold">Gestionar Propiedades</h2>
                                    <p className="mt-2 text-gray-600">
                                        Explorar todas las propiedades publicadas.
                                    </p>
                                    <Link href="/propiedades" className="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Ir a Propiedades
                                    </Link>
                                </div>

                                <div className="bg-gray-50 rounded-lg shadow p-6">
                                    <h2 className="text-xl font-bold">Gestionar Usuarios</h2>
                                    <p className="mt-2 text-gray-600">
                                        Administrar agentes y clientes del sistema.
                                    </p>
                                    <Link href="/dashboard/admin/usuarios" className="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                        Ir a Usuarios
                                    </Link>
                                </div>

                                <div className="bg-gray-50 rounded-lg shadow p-6">
                                    <h2 className="text-xl font-bold">Estadísticas</h2>
                                    <p className="mt-2 text-gray-600">
                                        Visualizar reportes y métricas de rendimiento.
                                    </p>
                                    <Link href="/dashboard/admin/estadisticas" className="mt-4 inline-block bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                                        Ver Estadísticas
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
