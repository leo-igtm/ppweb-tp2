import React from 'react';
import { Link, useForm } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Login({ status }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();
        post('/login', {
            onFinish: () => reset('password'),
        });
    };

    return (
        <AppLayout>
            <div className="py-16">
                <div className="max-w-md mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-8">
                            <h1 className="text-2xl font-bold text-gray-900">Iniciar sesión</h1>
                            <p className="mt-2 text-gray-600">
                                Ingresá tu email y contraseña para acceder a tu cuenta.
                            </p>

                            {status && (
                                <div className="mt-4 p-3 bg-green-100 text-green-700 rounded-md text-sm">
                                    {status}
                                </div>
                            )}

                            <form onSubmit={submit} className="mt-6 space-y-5">
                                <div>
                                    <label htmlFor="email" className="block text-sm font-medium text-gray-700">
                                        Email
                                    </label>
                                    <input
                                        id="email"
                                        type="email"
                                        value={data.email}
                                        onChange={(e) => setData('email', e.target.value)}
                                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        autoComplete="email"
                                        autoFocus
                                        required
                                    />
                                    {errors.email && (
                                        <p className="mt-1 text-sm text-red-600">{errors.email}</p>
                                    )}
                                </div>

                                <div>
                                    <label htmlFor="password" className="block text-sm font-medium text-gray-700">
                                        Contraseña
                                    </label>
                                    <input
                                        id="password"
                                        type="password"
                                        value={data.password}
                                        onChange={(e) => setData('password', e.target.value)}
                                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        autoComplete="current-password"
                                        required
                                    />
                                    {errors.password && (
                                        <p className="mt-1 text-sm text-red-600">{errors.password}</p>
                                    )}
                                </div>

                                <div className="flex items-center">
                                    <input
                                        id="remember"
                                        type="checkbox"
                                        checked={data.remember}
                                        onChange={(e) => setData('remember', e.target.checked)}
                                        className="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    />
                                    <label htmlFor="remember" className="ml-2 text-sm text-gray-600">
                                        Recordarme
                                    </label>
                                </div>

                                <button
                                    type="submit"
                                    disabled={processing}
                                    className="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 disabled:opacity-50 font-medium"
                                >
                                    {processing ? 'Ingresando...' : 'Ingresar'}
                                </button>
                            </form>

                            <p className="mt-6 text-center text-sm text-gray-600">
                                ¿No tenés cuenta?{' '}
                                <Link href="/register" className="text-indigo-600 hover:text-indigo-800 font-medium">
                                    Registrate
                                </Link>
                            </p>

                            <div className="mt-8 p-4 bg-gray-50 rounded-lg text-xs text-gray-500 space-y-1">
                                <p className="font-semibold text-gray-700">Cuentas de prueba:</p>
                                <p>Admin: admin@inmobiliaria.com</p>
                                <p>Gerente: gerente@inmobiliaria.com</p>
                                <p>Agente: carlos@inmobiliaria.com</p>
                                <p>Cliente: juan@inmobiliaria.com</p>
                                <p>Contraseña: password</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
