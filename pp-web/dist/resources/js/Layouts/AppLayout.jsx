import React, { useState } from 'react';
import { Link, usePage } from '@inertiajs/react';

export default function AppLayout({ children }) {
    const { auth } = usePage().props;
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

    return (
        <div className="min-h-screen bg-transparent text-slate-100">
            {/* Navigation */}
            <nav className="border-b border-white/10 bg-slate-950/70 backdrop-blur-xl shadow-[0_10px_30px_rgba(0,0,0,0.35)]">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16">
                        <div className="flex items-center">
                            <Link href="/" className="flex items-center gap-3 text-lg font-bold text-white">
                                <img src="/icon/inmobiliaria.png" alt="Arkham" className="h-9 w-9 rounded-md object-cover shadow-lg shadow-white/10" />
                                <span>Arkham</span>
                            </Link>
                        </div>

                        {/* Desktop Navigation */}
                        <div className="hidden md:flex items-center space-x-4">
                            <Link href="/" className="text-slate-300 hover:text-white">
                                Inicio
                            </Link>
                            <Link href="/propiedades" className="text-slate-300 hover:text-white">
                                Propiedades
                            </Link>
                            <Link href="/servicios" className="text-slate-300 hover:text-white">
                                Servicios
                            </Link>
                            <Link href="/contacto" className="text-slate-300 hover:text-white">
                                Contacto
                            </Link>

                            {auth.user ? (
                                <div className="flex items-center space-x-4">
                                    <Link
                                        href="/dashboard"
                                        className="text-slate-200 hover:text-cyan-300 font-medium"
                                    >
                                        {auth.user.name}
                                        <span className="ml-1 text-xs uppercase text-cyan-300 font-semibold">
                                            ({auth.user.role})
                                        </span>
                                    </Link>
                                    <Link
                                        href="/logout"
                                        method="post"
                                        as="button"
                                        className="bg-red-500/80 text-white px-4 py-2 rounded-lg hover:bg-red-500"
                                    >
                                        Logout
                                    </Link>
                                </div>
                            ) : (
                                <div className="flex items-center space-x-4">
                                    <Link
                                        href="/login"
                                        className="text-slate-300 hover:text-white"
                                    >
                                        Login
                                    </Link>
                                    <Link
                                        href="/register"
                                        className="bg-white/10 text-white px-4 py-2 rounded-lg border border-white/10 hover:bg-white/15"
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
                                className="text-slate-300 hover:text-white"
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
                            <Link href="/" className="block text-slate-300 hover:text-white py-2">
                                Inicio
                            </Link>
                            <Link href="/propiedades" className="block text-slate-300 hover:text-white py-2">
                                Propiedades
                            </Link>
                            <Link href="/servicios" className="block text-slate-300 hover:text-white py-2">
                                Servicios
                            </Link>
                            <Link href="/contacto" className="block text-slate-300 hover:text-white py-2">
                                Contacto
                            </Link>
                            {auth.user && (
                                <>
                                    <hr className="my-2 border-white/10" />
                                    <Link
                                        href="/dashboard"
                                        className="block text-slate-200 font-medium hover:text-cyan-300 py-2"
                                    >
                                        {auth.user.name}
                                        <span className="ml-1 text-xs uppercase text-cyan-300 font-semibold">
                                            ({auth.user.role})
                                        </span>
                                    </Link>
                                    <Link
                                        href="/logout"
                                        method="post"
                                        as="button"
                                        className="block text-red-300 hover:text-red-200 py-2 w-full text-left"
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
            <main className="bg-transparent">{children}</main>

            {/* Footer */}
            <footer className="mt-16 border-t border-white/10 bg-slate-950/70 text-white backdrop-blur-xl">
                <div className="max-w-7xl mx-auto px-4 py-12">
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <h3 className="text-xl font-bold mb-4">Arkham Inmobiliaria</h3>
                            <p className="text-slate-400">
                                Tu partner en bienes raíces. Encontramos el hogar perfecto para ti.
                            </p>
                        </div>
                        <div>
                            <h4 className="text-lg font-bold mb-4">Enlaces</h4>
                            <ul className="space-y-2 text-slate-400">
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
                            <p className="text-slate-400">
                                Email: info@arkham.com<br />
                                Teléfono: +1 (555) 123-4567
                            </p>
                        </div>
                    </div>
                    <div className="border-t border-white/10 mt-8 pt-8 text-center text-slate-400">
                        <p>&copy; 2026 Arkham Inmobiliaria. Todos los derechos reservados.</p>
                    </div>
                </div>
            </footer>
        </div>
    );
}
