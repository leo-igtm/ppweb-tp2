<?php

namespace App\Livewire\Propiedades;

use App\Models\Propiedad;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarPropiedad extends Component
{
    use WithFileUploads;

    public $propiedadId;
    public $titulo = '';
    public $descripcion = '';
    public $tipo = '';
    public $operacion = '';
    public $precio = '';
    public $direccion = '';
    public $ciudad = '';
    public $provincia = '';
    public $habitaciones = '';
    public $banos = '';
    public $superficie = '';
    public $disponible = true;
    public $imagen;
    public $imagenActual;

    public function mount(Propiedad $propiedad)
    {
        // Verificar permisos
        if (! auth()->user()->canEditProperty($propiedad)) {
            abort(403, 'No tienes permiso para editar esta propiedad.');
        }

        $this->propiedadId = $propiedad->id;
        $this->titulo = $propiedad->titulo;
        $this->descripcion = $propiedad->descripcion;
        $this->tipo = $propiedad->tipo;
        $this->operacion = $propiedad->operacion;
        $this->precio = $propiedad->precio;
        $this->direccion = $propiedad->direccion;
        $this->ciudad = $propiedad->ciudad;
        $this->provincia = $propiedad->provincia;
        $this->habitaciones = $propiedad->habitaciones;
        $this->banos = $propiedad->banos;
        $this->superficie = $propiedad->superficie;
        $this->disponible = $propiedad->disponible;
        $this->imagenActual = $propiedad->imagen;
    }

    protected function rules()
    {
        return [
            'titulo' => 'required|string|min:5|max:255',
            'descripcion' => 'required|string|min:10',
            'tipo' => 'required|in:casa,departamento,terreno,local,oficina',
            'operacion' => 'required|in:venta,alquiler',
            'precio' => 'required|numeric|min:0',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'habitaciones' => 'nullable|integer|min:0',
            'banos' => 'nullable|integer|min:0',
            'superficie' => 'nullable|numeric|min:0',
            'disponible' => 'boolean',
            'imagen' => 'nullable|image|max:2048',
        ];
    }

    protected $messages = [
        'titulo.required' => 'El título es obligatorio.',
        'titulo.min' => 'El título debe tener al menos 5 caracteres.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',
        'tipo.required' => 'El tipo de propiedad es obligatorio.',
        'tipo.in' => 'El tipo de propiedad seleccionado no es válido.',
        'operacion.required' => 'El tipo de operación es obligatorio.',
        'operacion.in' => 'El tipo de operación seleccionado no es válido.',
        'precio.required' => 'El precio es obligatorio.',
        'precio.numeric' => 'El precio debe ser un número.',
        'precio.min' => 'El precio debe ser mayor a 0.',
        'direccion.required' => 'La dirección es obligatoria.',
        'ciudad.required' => 'La ciudad es obligatoria.',
        'provincia.required' => 'La provincia es obligatoria.',
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.max' => 'La imagen no debe superar los 2MB.',
    ];

    public function actualizar()
    {
        $this->validate();

        $propiedad = Propiedad::findOrFail($this->propiedadId);

        $imagenPath = $this->imagenActual;
        if ($this->imagen) {
            // Eliminar imagen anterior si existe
            if ($imagenPath && \Storage::disk('public')->exists($imagenPath)) {
                \Storage::disk('public')->delete($imagenPath);
            }
            $imagenPath = $this->imagen->store('propiedades', 'public');
        }

        $propiedad->update([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'tipo' => $this->tipo,
            'operacion' => $this->operacion,
            'precio' => $this->precio,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'provincia' => $this->provincia,
            'habitaciones' => $this->habitaciones,
            'banos' => $this->banos,
            'superficie' => $this->superficie,
            'disponible' => $this->disponible,
            'imagen' => $imagenPath,
        ]);

        session()->flash('success', 'Propiedad actualizada exitosamente.');
        return redirect()->route('propiedades.index');
    }

    public function render()
    {
        return view('livewire.propiedades.editar-propiedad');
    }
}
