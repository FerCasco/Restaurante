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
