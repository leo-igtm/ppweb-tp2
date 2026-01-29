<?php

namespace App\Livewire\Propiedades;

use App\Models\Propiedad;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarPropiedad extends Component
{
    use WithFileUploads;

    public Propiedad $propiedad;
    
    public $titulo;
    public $descripcion;
    public $tipo;
    public $operacion;
    public $precio;
    public $direccion;
    public $ciudad;
    public $provincia;
    public $habitaciones;
    public $banos;
    public $superficie;
    public $disponible;
    public $imagen;
    public $imagenActual;
    public $agente_id;

    protected function rules()
    {
        return [
            'titulo' => 'required|string|min:5|max:255',
            'descripcion' => 'required|string|min:20',
            'tipo' => 'required|in:casa,departamento,terreno,local,oficina',
            'operacion' => 'required|in:venta,alquiler',
            'precio' => 'required|numeric|min:0',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
            'habitaciones' => 'nullable|integer|min:0|max:50',
            'banos' => 'nullable|integer|min:0|max:20',
            'superficie' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|max:2048',
            'agente_id' => 'required|exists:users,id',
        ];
    }

    protected $messages = [
        'titulo.required' => 'El título es obligatorio.',
        'titulo.min' => 'El título debe tener al menos 5 caracteres.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.min' => 'La descripción debe tener al menos 20 caracteres.',
        'precio.required' => 'El precio es obligatorio.',
        'precio.numeric' => 'El precio debe ser un número.',
        'direccion.required' => 'La dirección es obligatoria.',
        'ciudad.required' => 'La ciudad es obligatoria.',
        'provincia.required' => 'La provincia es obligatoria.',
        'superficie.required' => 'La superficie es obligatoria.',
        'imagen.image' => 'El archivo debe ser una imagen.',
        'imagen.max' => 'La imagen no puede pesar más de 2MB.',
    ];

    public function mount(Propiedad $propiedad)
    {
        // Verificar permisos
        if (!auth()->user()->isAdmin() && 
            (!auth()->user()->isAgente() || $propiedad->agente_id !== auth()->id())) {
            abort(403, 'No autorizado.');
        }

        $this->propiedad = $propiedad;
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
        $this->agente_id = $propiedad->agente_id;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'tipo' => $this->tipo,
            'operacion' => $this->operacion,
            'precio' => $this->precio,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'provincia' => $this->provincia,
            'habitaciones' => $this->habitaciones ?: null,
            'banos' => $this->banos ?: null,
            'superficie' => $this->superficie,
            'disponible' => $this->disponible,
            'agente_id' => $this->agente_id,
        ];

        // Procesar nueva imagen si existe
        if ($this->imagen) {
            // Eliminar imagen anterior
            if ($this->imagenActual && file_exists(public_path($this->imagenActual))) {
                unlink(public_path($this->imagenActual));
            }
            
            $filename = time() . '_' . $this->imagen->getClientOriginalName();
            $this->imagen->storeAs('public/propiedades', $filename);
            $data['imagen'] = 'storage/propiedades/' . $filename;
        }

        $this->propiedad->update($data);

        session()->flash('message', 'Propiedad actualizada exitosamente.');
        
        return redirect()->route('propiedades.index');
    }

    public function render()
    {
        $agentes = auth()->user()->isAdmin() 
            ? User::where('role', 'agente')->get() 
            : collect([auth()->user()]);

        return view('livewire.propiedades.editar-propiedad', [
            'agentes' => $agentes
        ]);
    }
}
