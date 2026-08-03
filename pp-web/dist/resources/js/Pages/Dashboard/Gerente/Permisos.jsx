import React from 'react';
import { useForm } from '@inertiajs/react';
import { route } from 'ziggy-js';
import AppLayout from '../../../Layouts/AppLayout';

const labels = {
    manage_users: 'Gestionar usuarios',
    create_property: 'Crear propiedades',
    edit_any_property: 'Editar cualquier propiedad',
    edit_own_property: 'Editar propias propiedades',
    delete_any_property: 'Eliminar cualquier propiedad',
    delete_own_property: 'Eliminar propias propiedades',
};

export default function Permisos({ permisos = {}, roles = [] }) {
    const { data, setData, patch, processing, recentlySuccessful } = useForm({
        permisos,
    });

    const updatePermission = (role, key, checked) => {
        setData('permisos', {
            ...data.permisos,
            [role]: {
                ...data.permisos[role],
                [key]: checked,
            },
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        patch(route('gerente.permisos.update'), {
            preserveScroll: true,
        });
    };

    return (
        <AppLayout>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6">
                            <div className="flex justify-between items-center mb-6">
                                <div>
                                    <h1 className="text-2xl font-bold text-gray-800">Permisos por rol</h1>
                                    <p className="text-gray-600 mt-1">Edita qué puede hacer cada rol en el sistema.</p>
                                </div>
                                <a href="/dashboard/gerente" className="text-indigo-600 hover:text-indigo-800 font-medium">
                                    ← Volver al panel
                                </a>
                            </div>

                            {recentlySuccessful && (
                                <div className="mb-4 rounded-md bg-green-50 px-4 py-3 text-green-800">
                                    Permisos actualizados correctamente.
                                </div>
                            )}

                            <form onSubmit={handleSubmit}>
                                <div className="overflow-x-auto">
                                    <table className="min-w-full divide-y divide-gray-200">
                                        <thead className="bg-gray-50">
                                            <tr>
                                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permiso</th>
                                                {roles.map((role) => (
                                                    <th key={role} className="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">
                                                        {role}
                                                    </th>
                                                ))}
                                            </tr>
                                        </thead>
                                        <tbody className="bg-white divide-y divide-gray-200">
                                            {Object.entries(labels).map(([key, label]) => (
                                                <tr key={key}>
                                                    <td className="px-6 py-4 text-sm font-medium text-gray-900">{label}</td>
                                                    {roles.map((role) => (
                                                        <td key={role} className="px-6 py-4 text-center text-sm">
                                                            <label className="inline-flex items-center justify-center cursor-pointer">
                                                                <input
                                                                    type="checkbox"
                                                                    checked={Boolean(data.permisos?.[role]?.[key])}
                                                                    onChange={(e) => updatePermission(role, key, e.target.checked)}
                                                                    className="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                                                />
                                                            </label>
                                                        </td>
                                                    ))}
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>

                                <div className="mt-6 flex justify-end">
                                    <button
                                        type="submit"
                                        disabled={processing}
                                        className="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 font-semibold disabled:opacity-50"
                                    >
                                        {processing ? 'Guardando...' : 'Guardar permisos'}
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
