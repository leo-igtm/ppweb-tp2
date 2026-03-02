<?php

namespace Database\Seeders;

use App\Models\Propiedad;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener agentes
        $agente1 = User::where('email', 'carlos@arkham.com')->first();
        $agente2 = User::where('email', 'maria@arkham.com')->first();

        // Propiedades del Agente 1
        Propiedad::create([
            'titulo' => 'Casa Moderna en Zona Residencial',
            'descripcion' => 'Hermosa casa de dos plantas con acabados de primera. Cuenta con amplio jardín, cochera para 2 vehículos y excelente ubicación cerca de centros comerciales y escuelas.',
            'tipo' => 'casa',
            'operacion' => 'venta',
            'precio' => 250000.00,
            'direccion' => 'Col. Escalón, Calle Principal #123',
            'ciudad' => 'San Salvador',
            'provincia' => 'San Salvador',
            'habitaciones' => 4,
            'banos' => 3,
            'superficie' => 280.50,
            'disponible' => true,
            'agente_id' => $agente1->id,
        ]);

        Propiedad::create([
            'titulo' => 'Departamento Céntrico Amueblado',
            'descripcion' => 'Moderno departamento en el corazón de la ciudad. Completamente amueblado con electrodomésticos nuevos. Ideal para profesionales o parejas jóvenes.',
            'tipo' => 'departamento',
            'operacion' => 'alquiler',
            'precio' => 850.00,
            'direccion' => 'Edificio Torre Vista, Piso 8, Apto 802',
            'ciudad' => 'San Salvador',
            'provincia' => 'San Salvador',
            'habitaciones' => 2,
            'banos' => 2,
            'superficie' => 95.00,
            'disponible' => true,
            'agente_id' => $agente1->id,
        ]);

        Propiedad::create([
            'titulo' => 'Terreno Comercial en Carretera Panamericana',
            'descripcion' => 'Excelente terreno para desarrollo comercial. Ubicado sobre carretera Panamericana con alto flujo vehicular. Ideal para gasolinera, restaurante o centro comercial.',
            'tipo' => 'terreno',
            'operacion' => 'venta',
            'precio' => 500000.00,
            'direccion' => 'Km 35 Carretera Panamericana',
            'ciudad' => 'Santa Tecla',
            'provincia' => 'La Libertad',
            'habitaciones' => null,
            'banos' => null,
            'superficie' => 1500.00,
            'disponible' => true,
            'agente_id' => $agente1->id,
        ]);

        // Propiedades del Agente 2
        Propiedad::create([
            'titulo' => 'Local Comercial en Centro de Santa Ana',
            'descripcion' => 'Amplio local comercial en la zona más transitada de Santa Ana. Perfecto para tienda, oficina o restaurante. Cuenta con baño y área de bodega.',
            'tipo' => 'local',
            'operacion' => 'alquiler',
            'precio' => 1200.00,
            'direccion' => 'Av. Independencia Sur #456',
            'ciudad' => 'Santa Ana',
            'provincia' => 'Santa Ana',
            'habitaciones' => null,
            'banos' => 1,
            'superficie' => 120.00,
            'disponible' => true,
            'agente_id' => $agente2->id,
        ]);

        Propiedad::create([
            'titulo' => 'Oficinas Ejecutivas Torre Empresarial',
            'descripcion' => 'Modernas oficinas en edificio corporativo de última generación. Incluye recepción, 3 oficinas privadas, sala de juntas, kitchenette y 2 baños. Seguridad 24/7 y estacionamiento.',
            'tipo' => 'oficina',
            'operacion' => 'alquiler',
            'precio' => 2500.00,
            'direccion' => 'World Trade Center, Piso 12',
            'ciudad' => 'San Salvador',
            'provincia' => 'San Salvador',
            'habitaciones' => null,
            'banos' => 2,
            'superficie' => 200.00,
            'disponible' => true,
            'agente_id' => $agente2->id,
        ]);

        Propiedad::create([
            'titulo' => 'Casa de Playa Frente al Mar',
            'descripcion' => 'Espectacular casa con vista panorámica al océano. Diseño arquitectónico único con grandes ventanales, terraza con jacuzzi y acceso directo a la playa. Un verdadero paraíso.',
            'tipo' => 'casa',
            'operacion' => 'venta',
            'precio' => 450000.00,
            'direccion' => 'Playa El Tunco, Km 2',
            'ciudad' => 'La Libertad',
            'provincia' => 'La Libertad',
            'habitaciones' => 5,
            'banos' => 4,
            'superficie' => 350.00,
            'disponible' => true,
            'agente_id' => $agente2->id,
        ]);

        Propiedad::create([
            'titulo' => 'Departamento Familiar con Piscina',
            'descripcion' => 'Amplio departamento en exclusivo residencial. El complejo cuenta con piscina, gimnasio, áreas verdes y juegos infantiles. Seguridad privada 24/7.',
            'tipo' => 'departamento',
            'operacion' => 'venta',
            'precio' => 180000.00,
            'direccion' => 'Residencial Los Pinos, Torre B, Apto 501',
            'ciudad' => 'Antiguo Cuscatlán',
            'provincia' => 'La Libertad',
            'habitaciones' => 3,
            'banos' => 2,
            'superficie' => 125.00,
            'disponible' => true,
            'agente_id' => $agente2->id,
        ]);

        Propiedad::create([
            'titulo' => 'Casa Colonial Restaurada Centro Histórico',
            'descripcion' => 'Hermosa casa colonial completamente restaurada conservando su arquitectura original. Pisos de ladrillo, techos altos, patio central con fuente. Una joya histórica.',
            'tipo' => 'casa',
            'operacion' => 'venta',
            'precio' => 320000.00,
            'direccion' => 'Calle Delgado #789, Centro Histórico',
            'ciudad' => 'San Salvador',
            'provincia' => 'San Salvador',
            'habitaciones' => 6,
            'banos' => 3,
            'superficie' => 400.00,
            'disponible' => true,
            'agente_id' => $agente1->id,
        ]);

        Propiedad::create([
            'titulo' => 'Terreno Residencial con Proyecto Aprobado',
            'descripcion' => 'Terreno plano con todos los servicios (agua, luz, alcantarillado). Incluye proyecto aprobado para construcción de 4 casas. Excelente oportunidad de inversión.',
            'tipo' => 'terreno',
            'operacion' => 'venta',
            'precio' => 280000.00,
            'direccion' => 'Urbanización Nueva Esperanza, Lote #15',
            'ciudad' => 'San Miguel',
            'provincia' => 'San Miguel',
            'habitaciones' => null,
            'banos' => null,
            'superficie' => 800.00,
            'disponible' => true,
            'agente_id' => $agente2->id,
        ]);

        Propiedad::create([
            'titulo' => 'Penthouse de Lujo con Vista Panorámica',
            'descripcion' => 'Exclusivo penthouse en el piso más alto del edificio más prestigioso de la ciudad. Acabados de lujo, terraza de 150m², jacuzzi privado y vista 360 grados. Para clientes exigentes.',
            'tipo' => 'departamento',
            'operacion' => 'venta',
            'precio' => 750000.00,
            'direccion' => 'Torre Millennium, Penthouse',
            'ciudad' => 'San Salvador',
            'provincia' => 'San Salvador',
            'habitaciones' => 4,
            'banos' => 5,
            'superficie' => 450.00,
            'disponible' => true,
            'agente_id' => $agente1->id,
        ]);
    }
}
