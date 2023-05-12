<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedores as ProveedorModel;
use App\Models\Trabajadores as TrabajadorModel;
use Livewire\WithPagination;

class Contacto extends Component
{

    use WithPagination;
    public $proveedores;
    public $trabajadores;

   public function mount(){
        $this->proveedores=ProveedorModel::all();
        $this->trabajadores=TrabajadorModel::all();
    }
    public function render()
    {
        return view('livewire.contacto', [
            'proveedores' => ProveedorModel::paginate(3),
            'trabajadores' => TrabajadorModel::paginate(2),
        ]);
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
