<?php

namespace App\Livewire\Propiedades;

use App\Models\Propiedad;
use Livewire\Component;

class VerPropiedad extends Component
{
    public $propiedad;

    public function mount($propiedad)
    {
        $this->propiedad = Propiedad::with('agente')->findOrFail($propiedad);
    }

    public function render()
    {
        return view('livewire.propiedades.ver-propiedad')
            ->layout('components.layouts.app');
    }
}
