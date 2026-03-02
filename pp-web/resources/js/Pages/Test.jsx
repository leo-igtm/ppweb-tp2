import React from 'react';
import { Link } from '@inertiajs/react';
import AppLayout from '../Layouts/AppLayout';

export default function Test() {
    return (
        <AppLayout>
            <div className="max-w-7xl mx-auto px-4 py-12">
                <h1 className="text-4xl font-bold mb-4 text-center">✅ Página de Prueba</h1>
                <p className="text-xl text-center text-gray-600 mb-8">
                    Si ves esto, el sistema está funcionando correctamente
                </p>
                
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div className="bg-blue-100 p-6 rounded-lg">
                        <h2 className="text-2xl font-bold mb-2">✅ React</h2>
                        <p>Los componentes de React se están cargando correctamente</p>
                    </div>
                    
                    <div className="bg-green-100 p-6 rounded-lg">
                        <h2 className="text-2xl font-bold mb-2">✅ Tailwind CSS</h2>
                        <p>Los estilos CSS están funcionando perfectamente</p>
                    </div>
                    
                    <div className="bg-purple-100 p-6 rounded-lg">
                        <h2 className="text-2xl font-bold mb-2">✅ Inertia.js</h2>
                        <p>La comunicación entre Laravel e React está activa</p>
                    </div>
                </div>

                <div className="text-center mt-12">
                    <Link
                        href="/"
                        className="inline-block bg-indigo-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-indigo-700"
                    >
                        Volver a Inicio
                    </Link>
                </div>
            </div>
        </AppLayout>
    );
}
