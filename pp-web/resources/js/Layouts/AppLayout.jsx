import React, { useState } from 'react';
import { Link, usePage } from '@inertiajs/react';

export default function AppLayout({ children }) {
    const { auth } = usePage().props;
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

    return (
        <div className="min-h-screen bg-gray-50">
            {/* Navigation */}
            <nav className="bg-white shadow">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16">
                        <div className="flex items-center">
                            <Link href="/" className="text-2xl font-bold text-indigo-600">
                                🏰 Arkham
                            </Link>
                        </div>

                        {/* Desktop Navigation */}
                        <div className="hidden md:flex items-center space-x-4">
                            <Link href="/" className="text-gray-600 hover:text-gray-900">
                                Inicio
                            </Link>
                            <Link href="/propiedades" className="text-gray-600 hover:text-gray-900">
                                Propiedades
                            </Link>
                            <Link href="/servicios" className="text-gray-600 hover:text-gray-900">
                                Servicios
                            </Link>
                            <Link href="/contacto" className="text-gray-600 hover:text-gray-900">
                                Contacto
                            </Link>

                            {auth.user ? (
                                <div className="flex items-center space-x-4">
                                    <Link
                                        href="/dashboard"
                                        className="text-gray-700 hover:text-indigo-600 font-medium"
                                    >
                                        {auth.user.name}
                                        <span className="ml-1 text-xs uppercase text-indigo-600 font-semibold">
                                            ({auth.user.role})
                                        </span>
                                    </Link>
                                    <Link
                                        href="/logout"
                                        method="post"
                                        as="button"
                                        className="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                    >
                                        Logout
                                    </Link>
                                </div>
                            ) : (
                                <div className="flex items-center space-x-4">
                                    <Link
                                        href="/login"
                                        className="text-indigo-600 hover:text-indigo-900"
                                    >
                                        Login
                                    </Link>
                                    <Link
                                        href="/register"
                                        className="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700"
                                    >
                                        Registrarse
                                    </Link>
                                </div>
                            )}
                        </div>

                        {/* Mobile Menu Button */}
                        <div className="md:hidden flex items-center">
                            <button
                                onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
                                className="text-gray-600 hover:text-gray-900"
                            >
                                <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {/* Mobile Menu */}
                    {mobileMenuOpen && (
                        <div className="md:hidden pb-4">
                            <Link href="/" className="block text-gray-600 hover:text-gray-900 py-2">
                                Inicio
                            </Link>
                            <Link href="/propiedades" className="block text-gray-600 hover:text-gray-900 py-2">
                                Propiedades
                            </Link>
                            <Link href="/servicios" className="block text-gray-600 hover:text-gray-900 py-2">
                                Servicios
                            </Link>
                            <Link href="/contacto" className="block text-gray-600 hover:text-gray-900 py-2">
                                Contacto
                            </Link>
                            {auth.user && (
                                <>
                                    <hr className="my-2 border-gray-200" />
                                    <Link
                                        href="/dashboard"
                                        className="block text-gray-800 font-medium hover:text-indigo-600 py-2"
                                    >
                                        {auth.user.name}
                                        <span className="ml-1 text-xs uppercase text-indigo-600 font-semibold">
                                            ({auth.user.role})
                                        </span>
                                    </Link>
                                    <Link
                                        href="/logout"
                                        method="post"
                                        as="button"
                                        className="block text-red-600 hover:text-red-800 py-2 w-full text-left"
                                    >
                                        Cerrar sesión
                                    </Link>
                                </>
                            )}
                        </div>
                    )}
                </div>
            </nav>

            {/* Main Content */}
            <main>{children}</main>

            {/* Footer */}
            <footer className="bg-gray-900 text-white mt-16">
                <div className="max-w-7xl mx-auto px-4 py-12">
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <h3 className="text-xl font-bold mb-4">Arkham Inmobiliaria</h3>
                            <p className="text-gray-400">
                                Tu partner en bienes raíces. Encontramos el hogar perfecto para ti.
                            </p>
                        </div>
                        <div>
                            <h4 className="text-lg font-bold mb-4">Enlaces</h4>
                            <ul className="space-y-2 text-gray-400">
                                <li>
                                    <Link href="/propiedades" className="hover:text-white">
                                        Propiedades
                                    </Link>
                                </li>
                                <li>
                                    <Link href="/servicios" className="hover:text-white">
                                        Servicios
                                    </Link>
                                </li>
                                <li>
                                    <Link href="/contacto" className="hover:text-white">
                                        Contacto
                                    </Link>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 className="text-lg font-bold mb-4">Contacto</h4>
                            <p className="text-gray-400">
                                Email: info@arkham.com<br />
                                Teléfono: +1 (555) 123-4567
                            </p>
                        </div>
                    </div>
                    <div className="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                        <p>&copy; 2026 Arkham Inmobiliaria. Todos los derechos reservados.</p>
                    </div>
                </div>
            </footer>
        </div>
    );
}
