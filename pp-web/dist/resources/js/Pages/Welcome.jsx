import React from 'react';
import { Link } from '@inertiajs/react';
import AppLayout from '../Layouts/AppLayout';

export default function Welcome({ propiedades = [] }) {
    return (
        <AppLayout>
            {/* Hero Section */}
            <section className="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
                <div className="max-w-7xl mx-auto px-4">
                    <div className="grid items-center gap-10 lg:grid-cols-2">
                        <div>
                            <h1 className="text-5xl md:text-6xl font-bold mb-4">
                                Bienvenido a Arkham Inmobiliaria
                            </h1>
                            <p className="text-xl md:text-2xl mb-8 text-indigo-100">
                                Tu socio de confianza en el mundo de los bienes raíces
                            </p>
                            <div className="flex gap-4 flex-wrap">
                                <Link
                                    href="/propiedades"
                                    className="bg-white text-indigo-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors"
                                >
                                    Explorar Propiedades
                                </Link>
                                <Link
                                    href="/contacto"
                                    className="border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-indigo-600 transition-colors"
                                >
                                    Contáctanos
                                </Link>
                            </div>
                        </div>

                        <div className="flex justify-center lg:justify-end">
                            <div className="rounded-3xl border border-white/20 bg-white/10 p-4 shadow-2xl backdrop-blur-xl">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Propiedades Destacadas */}
            <section className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4">
                    <h2 className="text-4xl font-bold mb-12 text-center">Propiedades Destacadas</h2>

                    {propiedades.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            {propiedades.map((propiedad) => (
                                <div
                                    key={propiedad.id}
                                    className="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow"
                                >
                                    <div className="bg-gradient-to-br from-indigo-400 to-purple-500 h-40 flex items-center justify-center">
                                        <span className="text-white text-2xl">🏠</span>
                                    </div>
                                    <div className="p-6">
                                        <h3 className="text-lg font-bold text-gray-900 mb-2">
                                            {propiedad.titulo}
                                        </h3>
                                        <p className="text-gray-600 text-sm mb-4 line-clamp-2">
                                            {propiedad.descripcion}
                                        </p>

                                        <div className="flex justify-between items-center mb-4">
                                            <span className="text-2xl font-bold text-indigo-600">
                                                ${parseFloat(propiedad.precio).toLocaleString()}
                                            </span>
                                            <span className="bg-blue-100 text-blue-800 px-3 py-1 rounded text-sm">
                                                {propiedad.tipo}
                                            </span>
                                        </div>

                                        <div className="flex gap-2 text-sm text-gray-700 mb-4 flex-wrap">
                                            {propiedad.habitaciones > 0 && (
                                                <span className="bg-gray-100 px-2 py-1 rounded">
                                                    🛏️ {propiedad.habitaciones}
                                                </span>
                                            )}
                                            {propiedad.banos > 0 && (
                                                <span className="bg-gray-100 px-2 py-1 rounded">
                                                    🚿 {propiedad.banos}
                                                </span>
                                            )}
                                            <span className="bg-gray-100 px-2 py-1 rounded">
                                                📍 {propiedad.ciudad}
                                            </span>
                                        </div>

                                        <Link
                                            href={`/propiedades/${propiedad.id}`}
                                            className="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 block text-center font-bold transition-colors"
                                        >
                                            Ver Detalles
                                        </Link>
                                    </div>
                                </div>
                            ))}
                        </div>
                    ) : (
                        <div className="text-center py-12">
                            <p className="text-gray-600 text-lg">
                                No hay propiedades destacadas disponibles en este momento.
                            </p>
                        </div>
                    )}

                    <div className="text-center mt-12">
                        <Link
                            href="/propiedades"
                            className="inline-block bg-indigo-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-indigo-700 transition-colors"
                        >
                            Ver Todas las Propiedades
                        </Link>
                    </div>
                </div>
            </section>

            {/* Servicios Destacados */}
            <section className="py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4">
                    <h2 className="text-4xl font-bold mb-12 text-center">Nuestros Servicios</h2>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        {[
                            {
                                icono: '👨‍💼',
                                titulo: 'Asesoramiento',
                                descripcion: 'Expertos en el mercado inmobiliario listos para guiarte en tu decisión',
                            },
                            {
                                icono: '📊',
                                titulo: 'Tasación Profesional',
                                descripcion: 'Avalúos certificados con metodología internacional',
                            },
                            {
                                icono: '📋',
                                titulo: 'Gestión Documental',
                                descripcion: 'Nos encargamos de toda la documentación requerida',
                            },
                            {
                                icono: '📢',
                                titulo: 'Marketing Digital',
                                descripcion: 'Promoción profesional en múltiples plataformas',
                            },
                            {
                                icono: '💳',
                                titulo: 'Financiamiento',
                                descripcion: 'Asesoría en opciones de crédito competitivas',
                            },
                            {
                                icono: '🏢',
                                titulo: 'Administración',
                                descripcion: 'Gestión completa de propiedades en alquiler',
                            },
                        ].map((servicio, idx) => (
                            <div
                                key={idx}
                                className="text-center p-8 bg-gray-50 rounded-lg hover:shadow-lg transition-shadow"
                            >
                                <div className="text-5xl mb-4">{servicio.icono}</div>
                                <h3 className="text-xl font-bold mb-2">{servicio.titulo}</h3>
                                <p className="text-gray-600">{servicio.descripcion}</p>
                            </div>
                        ))}
                    </div>

                    <div className="text-center mt-12">
                        <Link
                            href="/servicios"
                            className="inline-block bg-indigo-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-indigo-700 transition-colors"
                        >
                            Conocer Todos los Servicios
                        </Link>
                    </div>
                </div>
            </section>

            {/* CTA Final */}
            <section className="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-16">
                <div className="max-w-7xl mx-auto px-4 text-center">
                    <h2 className="text-4xl font-bold mb-4">¿Listo para encontrar tu propiedad ideal?</h2>
                    <p className="text-xl mb-8 text-purple-100">
                        Contáctanos hoy y nuestro equipo de expertos te ayudará a lograr tus objetivos inmobiliarios
                    </p>
                    <Link
                        href="/contacto"
                        className="inline-block bg-white text-indigo-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors"
                    >
                        Solicitar Consulta Gratuita
                    </Link>
                </div>
            </section>
        </AppLayout>
    );
}
