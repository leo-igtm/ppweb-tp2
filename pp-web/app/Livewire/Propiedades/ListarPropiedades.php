<?php

namespace App\Livewire\Propiedades;

use App\Models\Propiedad;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ListarPropiedades extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $tipoFilter = '';
    public $operacionFilter = '';
    public $disponibleFilter = '';

    protected $queryString = ['search', 'tipoFilter', 'operacionFilter', 'disponibleFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTipoFilter()
    {
        $this->resetPage();
    }

    public function updatingOperacionFilter()
    {
        $this->resetPage();
    }

    public function updatingDisponibleFilter()
    {
        $this->resetPage();
    }

    public function eliminar($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        
        // Verificar que el usuario tiene permiso
        if (auth()->user()->isAdmin() || 
            (auth()->user()->isAgente() && $propiedad->agente_id === auth()->id())) {
            
            // Eliminar imagen si existe
            if ($propiedad->imagen && file_exists(public_path($propiedad->imagen))) {
                unlink(public_path($propiedad->imagen));
            }
            
            $propiedad->delete();
            session()->flash('message', 'Propiedad eliminada exitosamente.');
        } else {
            session()->flash('error', 'No tienes permiso para eliminar esta propiedad.');
        }
    }

    public function render()
    {
        $query = Propiedad::with('agente');

        // Aplicar filtros
        if ($this->search) {
            $query->where(function($q) {
                $q->where('titulo', 'like', '%' . $this->search . '%')
                  ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                  ->orWhere('direccion', 'like', '%' . $this->search . '%')
                  ->orWhere('ciudad', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->tipoFilter) {
            $query->where('tipo', $this->tipoFilter);
        }

        if ($this->operacionFilter) {
            $query->where('operacion', $this->operacionFilter);
        }

        if ($this->disponibleFilter !== '') {
            $query->where('disponible', $this->disponibleFilter);
        }

        // Si es agente, solo ver sus propiedades
        if (auth()->user()->isAgente()) {
            $query->where('agente_id', auth()->id());
        }

        $propiedades = $query->latest()->paginate(10);

        return view('livewire.propiedades.listar-propiedades', [
            'propiedades' => $propiedades
        ]);
    }
}
