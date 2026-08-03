<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';

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

    protected $casts = [
        'precio' => 'decimal:2',
        'superficie' => 'decimal:2',
        'disponible' => 'boolean',
        'habitaciones' => 'integer',
        'banos' => 'integer',
    ];

    protected $appends = [
        'imagen_url',
    ];

    /**
     * Relación con el agente (usuario)
     */
    public function agente()
    {
        return $this->belongsTo(User::class, 'agente_id');
    }

    public function getImagenUrlAttribute(): ?string
    {
        return $this->imagen ? Storage::url($this->imagen) : null;
    }
}