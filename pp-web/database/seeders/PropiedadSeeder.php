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
        $agentes = User::where('role', 'agente')->get();

        if ($agentes->isEmpty()) {
            $this->command->warn('No hay agentes disponibles. Ejecuta UserSeeder primero.');
            return;
        }

        $propiedades = [
            [
                'titulo' => 'Casa moderna en barrio privado',
                'descripcion' => 'Hermosa casa de 3 dormitorios con amplio jardín y piscina. Ubicada en barrio cerrado con seguridad las 24 horas. Cuenta con cocina equipada, living-comedor amplio, y garaje para 2 autos.',
                'tipo' => 'casa',
                'operacion' => 'venta',
                'precio' => 350000,
                'direccion' => 'Av. Los Robles 1234',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => 3,
                'banos' => 2,
                'superficie' => 180,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Departamento céntrico 2 ambientes',
                'descripcion' => 'Departamento luminoso en pleno centro de la ciudad. Totalmente amoblado, con balcón. Ideal para estudiantes o profesionales. Cerca de transporte público y todos los servicios.',
                'tipo' => 'departamento',
                'operacion' => 'alquiler',
                'precio' => 45000,
                'direccion' => 'San Martín 567',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => 2,
                'banos' => 1,
                'superficie' => 50,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Terreno en zona residencial',
                'descripcion' => 'Excelente terreno para construcción en zona residencial de rápido crecimiento. Todos los servicios disponibles. Documentación en regla.',
                'tipo' => 'terreno',
                'operacion' => 'venta',
                'precio' => 85000,
                'direccion' => 'Calle 15 entre 8 y 9',
                'ciudad' => 'Villa Carlos Paz',
                'provincia' => 'Córdoba',
                'habitaciones' => null,
                'banos' => null,
                'superficie' => 400,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Local comercial sobre avenida principal',
                'descripcion' => 'Local comercial a estrenar en zona de alto tránsito vehicular y peatonal. Ideal para cualquier tipo de comercio. Amplio espacio, baño y cocina.',
                'tipo' => 'local',
                'operacion' => 'alquiler',
                'precio' => 120000,
                'direccion' => 'Av. Colón 2345',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => null,
                'banos' => 1,
                'superficie' => 80,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Oficina en edificio corporativo',
                'descripcion' => 'Oficina en piso alto con excelente vista panorámica. Edificio con seguridad, estacionamiento y servicios de limpieza. Perfecta para empresas establecidas.',
                'tipo' => 'oficina',
                'operacion' => 'alquiler',
                'precio' => 95000,
                'direccion' => 'Av. Vélez Sarsfield 789',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => null,
                'banos' => 2,
                'superficie' => 120,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Casa quinta con pileta',
                'descripcion' => 'Hermosa casa quinta con amplio parque y pileta. 4 dormitorios, quincho con parrilla, y espacio para huerta. Ideal para familias que buscan tranquilidad.',
                'tipo' => 'casa',
                'operacion' => 'venta',
                'precio' => 280000,
                'direccion' => 'Camino a San Antonio km 8',
                'ciudad' => 'Río Ceballos',
                'provincia' => 'Córdoba',
                'habitaciones' => 4,
                'banos' => 3,
                'superficie' => 250,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Departamento de lujo en torre',
                'descripcion' => 'Departamento de alta gama en torre premium. Amenities completos: gimnasio, SUM, piscina. Terminaciones de primera calidad, 3 dormitorios en suite.',
                'tipo' => 'departamento',
                'operacion' => 'venta',
                'precio' => 420000,
                'direccion' => 'Bv. San Juan 1500',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => 3,
                'banos' => 3,
                'superficie' => 140,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Casa tradicional en barrio histórico',
                'descripcion' => 'Casa recientemente renovada conservando su encanto original. Ubicada en barrio tradicional con toda la historia de la ciudad. 2 dormitorios, patio amplio.',
                'tipo' => 'casa',
                'operacion' => 'alquiler',
                'precio' => 65000,
                'direccion' => 'Caseros 890',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => 2,
                'banos' => 1,
                'superficie' => 110,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Departamento estudiantes zona universitaria',
                'descripcion' => 'Monoambiente ideal para estudiantes. A metros de Ciudad Universitaria. Cuenta con kitchenette y baño completo. Muy luminoso.',
                'tipo' => 'departamento',
                'operacion' => 'alquiler',
                'precio' => 35000,
                'direccion' => 'Valparaíso 345',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => 1,
                'banos' => 1,
                'superficie' => 32,
                'disponible' => true,
                'agente_id' => $agentes->random()->id,
            ],
            [
                'titulo' => 'Local gastronómico equipado',
                'descripcion' => 'Local completamente equipado para gastronomía. Incluye cocina industrial, cámaras frigoríficas, mesas y sillas. Listo para iniciar operaciones.',
                'tipo' => 'local',
                'operacion' => 'venta',
                'precio' => 180000,
                'direccion' => 'Av. Hipólito Yrigoyen 456',
                'ciudad' => 'Córdoba',
                'provincia' => 'Córdoba',
                'habitaciones' => null,
                'banos' => 2,
                'superficie' => 150,
                'disponible' => false,
                'agente_id' => $agentes->random()->id,
            ],
        ];

        foreach ($propiedades as $propiedad) {
            Propiedad::create($propiedad);
        }
    }
}
