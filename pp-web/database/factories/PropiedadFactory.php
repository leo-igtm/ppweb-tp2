<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propiedad>
 */
class PropiedadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo = fake()->randomElement(['casa', 'departamento', 'terreno', 'local', 'oficina']);
        $operacion = fake()->randomElement(['venta', 'alquiler']);

        return [
            'titulo' => ucfirst($tipo) . ' ' . fake()->words(3, true),
            'descripcion' => fake()->paragraph(2),
            'tipo' => $tipo,
            'operacion' => $operacion,
            'precio' => $operacion === 'alquiler' ? fake()->randomFloat(2, 500, 5000) : fake()->randomFloat(2, 50000, 900000),
            'direccion' => fake()->streetAddress(),
            'ciudad' => fake()->city(),
            'provincia' => fake()->state(),
            'habitaciones' => in_array($tipo, ['casa', 'departamento', 'oficina']) ? fake()->numberBetween(1, 5) : null,
            'banos' => in_array($tipo, ['casa', 'departamento', 'oficina']) ? fake()->numberBetween(1, 4) : null,
            'superficie' => fake()->randomFloat(2, 50, 500),
            'disponible' => true,
            'imagen' => null,
            'agente_id' => User::factory()->state(['role' => 'agente']),
        ];
    }

    public function noDisponible(): static
    {
        return $this->state(fn () => ['disponible' => false]);
    }

    public function venta(): static
    {
        return $this->state(fn () => ['operacion' => 'venta', 'precio' => fake()->randomFloat(2, 80000, 900000)]);
    }

    public function alquiler(): static
    {
        return $this->state(fn () => ['operacion' => 'alquiler', 'precio' => fake()->randomFloat(2, 500, 5000)]);
    }
}
