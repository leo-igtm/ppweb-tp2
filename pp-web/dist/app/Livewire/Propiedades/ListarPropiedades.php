<?php

namespace App\Livewire\Propiedades;

use App\Models\Propiedad;
use Livewire\Component;
use Livewire\WithPagination;

class ListarPropiedades extends Component
{
    use WithPagination;

    public $search = '';
    public $filterTipo = '';
    public $filterOperacion = '';
    public $filterDisponible = '';

    protected $queryString = ['search', 'filterTipo', 'filterOperacion', 'filterDisponible'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterTipo()
    {
        $this->resetPage();
    }

    public function updatingFilterOperacion()
    {
        $this->resetPage();
    }

    public function updatingFilterDisponible()
    {
        $this->resetPage();
    }

    public function limpiarFiltros()
    {
        $this->search = '';
        $this->filterTipo = '';
        $this->filterOperacion = '';
        $this->filterDisponible = '';
        $this->resetPage();
    }

    public function eliminar($id)
    {
        $propiedad = Propiedad::findOrFail($id);

        // Verificar que el usuario tenga permiso
        if (! auth()->user()->canDeleteProperty($propiedad)) {
            session()->flash('error', 'No tienes permiso para eliminar esta propiedad.');
            return;
        }

        // Eliminar imagen si existe
        if ($propiedad->imagen && \Storage::disk('public')->exists($propiedad->imagen)) {
            \Storage::disk('public')->delete($propiedad->imagen);
        }

        $propiedad->delete();
        session()->flash('success', 'Propiedad eliminada correctamente.');
    }

    public function render()
    {
        $query = Propiedad::query()
            ->with('agente');

        if (auth()->user()->isAgente()) {
            $query->where('agente_id', auth()->id());
        }

        $propiedades = $query
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('titulo', 'like', '%' . $this->search . '%')
                      ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                      ->orWhere('direccion', 'like', '%' . $this->search . '%')
                      ->orWhere('ciudad', 'like', '%' . $this->search . '%')
                      ->orWhere('provincia', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterTipo, function ($query) {
                $query->where('tipo', $this->filterTipo);
            })
            ->when($this->filterOperacion, function ($query) {
                $query->where('operacion', $this->filterOperacion);
            })
            ->when($this->filterDisponible !== '', function ($query) {
                $query->where('disponible', $this->filterDisponible);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.propiedades.listar-propiedades', [
            'propiedades' => $propiedades
        ])->layout('components.layouts.app');
    }
}
