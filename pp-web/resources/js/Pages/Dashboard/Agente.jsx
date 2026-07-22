import React from 'react';
import { Link } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Agente() {
  return (
    <AppLayout>
      <div className="max-w-7xl mx-auto px-4 py-12">
        <h1 className="text-3xl font-bold mb-4">Panel Agente</h1>
        <p className="text-gray-600 mb-6">Puedes crear propiedades y gestionar solo las tuyas.</p>

        <aside className="w-full md:w-80 bg-gray-100 p-4 rounded">
          <div className="flex flex-col gap-2">
            <Link href="/dashboard/propiedades" className="text-blue-600 hover:underline">Ver propiedades</Link>
            <Link href="/dashboard/propiedades/crear/nueva" className="text-blue-600 hover:underline">Crear propiedad</Link>
          </div>
        </aside>
      </div>
    </AppLayout>
  );
}
