<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedores as ProveedoresModel;
use App\Models\Trabajadores as TrabajadoresModel;

class ContactoSeleccionado extends Component
{
    public $contacto;
    //protected $listeners = ['recibirContacto'];
    public function mostrarContacto(Request $request)
    {
        $id = $request->input('id');
    }

    public function recibirContacto( $id)
    {
        if(class_basename($id)=="Proveedores"){
            $this->contacto=ProveedoresModel::where('id', $id)->get()->first();
        }else{
            $this->contacto=TrabajadoresModel::where('id', $id)->get()->first();
        }

    }

    public function render()
    {
        return view('livewire.contacto-seleccionado');
    }
}
