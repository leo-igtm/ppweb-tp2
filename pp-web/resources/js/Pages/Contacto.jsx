import { useState } from 'react';
import { useForm } from '@inertiajs/react';
import AppLayout from '../Layouts/AppLayout';

export default function Contacto() {
    const { data, setData, post, processing, errors } = useForm({
        nombre: '',
        email: '',
        telefono: '',
        asunto: '',
        mensaje: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/contacto', {
            onSuccess: () => {
                // Reset form
                setData({
                    nombre: '',
                    email: '',
                    telefono: '',
                    asunto: '',
                    mensaje: '',
                });
                alert('¡Mensaje enviado exitosamente! Nos pondremos en contacto pronto.');
            },
        });
    };

    return (
        <AppLayout>
            <div className="max-w-7xl mx-auto px-4 py-12">
                <h1 className="text-4xl font-bold text-center mb-4">Contactanos</h1>
                <p className="text-gray-600 text-center mb-12">
                    ¿Tienes preguntas? Nos encantaría escucharte. Completa el formulario y nos
                    pondremos en contacto lo antes posible.
                </p>

                <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    {/* Contact Information */}
                    <div className="lg:col-span-1">
                        <div className="bg-white rounded-lg shadow-lg p-8">
                            <h2 className="text-2xl font-bold mb-6">Información de Contacto</h2>

                            <div className="space-y-6">
                                <div>
                                    <h3 className="font-bold text-gray-900 mb-2">Teléfono</h3>
                                    <p className="text-gray-600">+1 (555) 123-4567</p>
                                    <p className="text-gray-600">+1 (555) 987-6543</p>
                                </div>

                                <div>
                                    <h3 className="font-bold text-gray-900 mb-2">Email</h3>
                                    <p className="text-gray-600">info@arkham.com</p>
                                    <p className="text-gray-600">ventas@arkham.com</p>
                                </div>

                                <div>
                                    <h3 className="font-bold text-gray-900 mb-2">Dirección</h3>
                                    <p className="text-gray-600">
                                        Calle Principal 123<br />
                                        San Salvador, El Salvador
                                    </p>
                                </div>

                                <div>
                                    <h3 className="font-bold text-gray-900 mb-2">Horarios</h3>
                                    <p className="text-gray-600">
                                        Lunes - Viernes: 8:00 AM - 6:00 PM<br />
                                        Sábado: 9:00 AM - 2:00 PM<br />
                                        Domingo: Cerrado
                                    </p>
                                </div>

                                <div>
                                    <h3 className="font-bold text-gray-900 mb-4">Síguenos</h3>
                                    <div className="flex gap-4">
                                        <a href="#" className="text-blue-600 hover:text-blue-800">
                                            Facebook
                                        </a>
                                        <a href="#" className="text-sky-600 hover:text-sky-800">
                                            Twitter
                                        </a>
                                        <a href="#" className="text-pink-600 hover:text-pink-800">
                                            Instagram
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Contact Form */}
                    <div className="lg:col-span-2">
                        <div className="bg-white rounded-lg shadow-lg p-8">
                            <h2 className="text-2xl font-bold mb-6">Envíanos un Mensaje</h2>

                            <form onSubmit={handleSubmit} className="space-y-6">
                                <div>
                                    <label className="block text-gray-700 font-bold mb-2">
                                        Nombre *
                                    </label>
                                    <input
                                        type="text"
                                        value={data.nombre}
                                        onChange={(e) => setData('nombre', e.target.value)}
                                        className={`w-full border px-4 py-2 rounded text-black ${
                                            errors.nombre ? 'border-red-500' : 'border-gray-300'
                                        }`}
                                        placeholder="Tu nombre completo"
                                    />
                                    {errors.nombre && (
                                        <p className="text-red-500 text-sm mt-1">{errors.nombre}</p>
                                    )}
                                </div>

                                <div>
                                    <label className="block text-gray-700 font-bold mb-2">
                                        Email *
                                    </label>
                                    <input
                                        type="email"
                                        value={data.email}
                                        onChange={(e) => setData('email', e.target.value)}
                                        className={`w-full border px-4 py-2 rounded text-black ${
                                            errors.email ? 'border-red-500' : 'border-gray-300'
                                        }`}
                                        placeholder="tu@email.com"
                                    />
                                    {errors.email && (
                                        <p className="text-red-500 text-sm mt-1">{errors.email}</p>
                                    )}
                                </div>

                                <div>
                                    <label className="block text-gray-700 font-bold mb-2">
                                        Teléfono
                                    </label>
                                    <input
                                        type="tel"
                                        value={data.telefono}
                                        onChange={(e) => setData('telefono', e.target.value)}
                                        className="w-full border border-gray-300 px-4 py-2 rounded text-black"
                                        placeholder="+1 (555) 123-4567"
                                    />
                                </div>

                                <div>
                                    <label className="block text-gray-700 font-bold mb-2">
                                        Asunto *
                                    </label>
                                    <select
                                        value={data.asunto}
                                        onChange={(e) => setData('asunto', e.target.value)}
                                        className={`w-full border px-4 py-2 rounded text-black ${
                                            errors.asunto ? 'border-red-500' : 'border-gray-300'
                                        }`}
                                    >
                                        <option value="">Selecciona un asunto</option>
                                        <option value="consulta_general">Consulta General</option>
                                        <option value="venta_propiedad">Vender Propiedad</option>
                                        <option value="compra_propiedad">
                                            Comprar Propiedad
                                        </option>
                                        <option value="alquiler">Alquiler</option>
                                        <option value="tasacion">Tasación</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                    {errors.asunto && (
                                        <p className="text-red-500 text-sm mt-1">{errors.asunto}</p>
                                    )}
                                </div>

                                <div>
                                    <label className="block text-gray-700 font-bold mb-2">
                                        Mensaje *
                                    </label>
                                    <textarea
                                        value={data.mensaje}
                                        onChange={(e) => setData('mensaje', e.target.value)}
                                        rows="5"
                                        className={`w-full border px-4 py-2 rounded text-black ${
                                            errors.mensaje ? 'border-red-500' : 'border-gray-300'
                                        }`}
                                        placeholder="Cuéntanos tu consulta o necesidad..."
                                    ></textarea>
                                    {errors.mensaje && (
                                        <p className="text-red-500 text-sm mt-1">{errors.mensaje}</p>
                                    )}
                                </div>

                                <button
                                    type="submit"
                                    disabled={processing}
                                    className="w-full bg-indigo-600 text-white py-3 rounded font-bold hover:bg-indigo-700 disabled:opacity-50"
                                >
                                    {processing ? 'Enviando...' : 'Enviar Mensaje'}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
