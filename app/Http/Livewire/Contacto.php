<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedores as ProveedorModel;
use App\Models\Trabajadores as TrabajadorModel;
use Livewire\WithPagination;

class Contacto extends Component
{

    use WithPagination;
    protected $proveedores;
    protected $trabajadores;
    public $trabajadorModal;
    public $showTrabajadorDetails = 'hidden';
    protected $listeners = ['showTrabajadorDetails'=> 'mostrarModal'];
    
    public function mount()
    {
        $this->proveedores = ProveedorModel::all();
        $this->trabajadores = TrabajadorModel::all();
    }
    public function render()
    {
        $proveedores = ProveedorModel::paginate(5, ['*'], 'proveedoresPage');
        $trabajadores = TrabajadorModel::paginate(5, ['*'], 'trabajadoresPage');

        return view('livewire.contacto', [
            'proveedores' => $proveedores,
            'trabajadores' => $trabajadores
        ]);
    }
    public function showTrabajadorDetails(TrabajadorModel $trabajadorModal)
    {
        $this->trabajadorModal = $trabajadorModal;
        json_decode($this->trabajadorModal);
        $this->emit('showTrabajadorDetails',$this->trabajadorModal);
    
  
        // Puedes ajustar la lógica para obtener los detalles del trabajador según tu estructura de base de datos y modelos
    }

    public function mostrarModal($trabajadorModal){
        $this->showTrabajadorDetails='';
    }
    public function cerrarModal(){
        $this->showTrabajadorDetails='hidden';
    }
    /*
    public $perPage = 5;
    public function render()
    {
        $proveedores = ProveedorModel::paginate($this->perPage);
        $trabajadores = TrabajadorModel::paginate($this->perPage);

        return view('livewire.contacto', [
            'proveedores' => $proveedores,
            'trabajadores' => $trabajadores,
        ]);
    }*/
}
