import { Link } from '@inertiajs/react';
import AppLayout from '../Layouts/AppLayout';

export default function Servicios() {
    const servicios = [
        {
            id: 1,
            titulo: 'Asesoramiento Inmobiliario Profesional',
            descripcion:
                'Nuestro equipo de expertos te guía en cada paso del proceso de compra o venta de propiedades. Analizamos el mercado, evaluamos opciones y te ayudamos a tomar decisiones informadas.',
            icono: '👨‍💼',
            detalles: [
                'Análisis de mercado actualizado',
                'Recomendaciones personalizadas',
                'Negociación de precios',
                'Asesoría legal básica',
            ],
        },
        {
            id: 2,
            titulo: 'Tasación y Avalúo de Propiedades',
            descripcion:
                'Evaluación profesional del valor actual de una propiedad según estándares internacionales y condiciones del mercado local.',
            icono: '📊',
            detalles: [
                'Avalúos certificados',
                'Comparativas de mercado',
                'Informes detallados',
                'Validez legal garantizada',
            ],
        },
        {
            id: 3,
            titulo: 'Gestión Documental Completa',
            descripcion:
                'Nos encargamos de toda la documentación y trámites necesarios para cerrar la transacción de forma segura y legal.',
            icono: '📋',
            detalles: [
                'Preparación de contratos',
                'Verificación de títulos de propiedad',
                'Trámites notariales',
                'Registro de propiedades',
            ],
        },
        {
            id: 4,
            titulo: 'Marketing y Publicidad de Propiedades',
            descripcion:
                'Promoción profesional de tus propiedades en múltiples plataformas para alcanzar el máximo número de potenciales compradores.',
            icono: '📢',
            detalles: [
                'Fotografía profesional',
                'Videos y tours virtuales',
                'Publicación en redes sociales',
                'Base de datos de clientes',
            ],
        },
        {
            id: 5,
            titulo: 'Financiamiento y Gestión Crediticia',
            descripcion:
                'Asistencia en la búsqueda de opciones de financiamiento competitivas y gestión de trámites con instituciones financieras.',
            icono: '💳',
            detalles: [
                'Conexión con instituciones financieras',
                'Análisis de opciones de crédito',
                'Asesoría en tasas de interés',
                'Seguimiento de procesos',
            ],
        },
        {
            id: 6,
            titulo: 'Administración de Propiedades en Alquiler',
            descripcion:
                'Gestión integral de propiedades alquiladas, incluyendo búsqueda de inquilinos, cobro de rentas y mantenimiento.',
            icono: '🏢',
            detalles: [
                'Búsqueda de inquilinos',
                'Gestión de pagos de renta',
                'Mantenimiento y reparaciones',
                'Reportes financieros mensuales',
            ],
        },
    ];

    return (
        <AppLayout>
            <div className="max-w-7xl mx-auto px-4 py-12">
                <h1 className="text-4xl font-bold text-center mb-4">Nuestros Servicios</h1>
                <p className="text-gray-600 text-center mb-12">
                    En Arkham Inmobiliaria, ofrecemos una amplia gama de servicios profesionales
                    para satisfacer todas tus necesidades inmobiliarias.
                </p>

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {servicios.map((servicio) => (
                        <div
                            key={servicio.id}
                            className="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow p-8"
                        >
                            <div className="text-5xl mb-4">{servicio.icono}</div>
                            <h3 className="text-2xl font-bold mb-4">{servicio.titulo}</h3>
                            <p className="text-gray-600 mb-6">{servicio.descripcion}</p>

                            <div className="mb-6">
                                <h4 className="font-bold text-gray-900 mb-2">Lo que incluye:</h4>
                                <ul className="space-y-1">
                                    {servicio.detalles.map((detalle, idx) => (
                                        <li key={idx} className="text-gray-700 flex items-center">
                                            <span className="text-indigo-600 mr-2">✓</span>
                                            {detalle}
                                        </li>
                                    ))}
                                </ul>
                            </div>

                            <Link
                                href="/contacto"
                                className="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 block text-center font-bold"
                            >
                                Solicitar Servicio
                            </Link>
                        </div>
                    ))}
                </div>

                {/* Additional CTA */}
                <div className="mt-16 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg p-12 text-center">
                    <h2 className="text-3xl font-bold mb-4">
                        ¿Necesitas un servicio personalizado?
                    </h2>
                    <p className="mb-6">
                        Contáctanos y nuestro equipo te ofrecerá soluciones a medida para tus
                        necesidades.
                    </p>
                    <Link
                        href="/contacto"
                        className="bg-white text-indigo-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 inline-block"
                    >
                        Contactar Ahora
                    </Link>
                </div>
            </div>
        </AppLayout>
    );
}
