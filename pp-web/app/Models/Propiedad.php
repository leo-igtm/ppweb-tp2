<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'tipo',
        'operacion',
        'precio',
        'direccion',
        'ciudad',
        'provincia',
        'habitaciones',
        'banos',
        'superficie',
        'disponible',
        'imagen',
        'agente_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2',
            'superficie' => 'decimal:2',
            'disponible' => 'boolean',
            'habitaciones' => 'integer',
            'banos' => 'integer',
        ];
    }

    /**
     * Get the agente that owns the propiedad.
     */
    public function agente()
    {
        return $this->belongsTo(User::class, 'agente_id');
    }

    /**
     * Scope a query to only include available properties.
     */
    public function scopeDisponible($query)
    {
        return $query->where('disponible', true);
    }

    /**
     * Scope a query to filter by tipo.
     */
    public function scopeOfTipo($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Scope a query to filter by operacion.
     */
    public function scopeOfOperacion($query, $operacion)
    {
        return $query->where('operacion', $operacion);
    }
}
