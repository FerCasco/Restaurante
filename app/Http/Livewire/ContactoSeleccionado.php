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

    public function mount($email)
    {
        if(ProveedoresModel::where('email', $email)->get()->first()!=null)
        {
            $this->contacto=ProveedoresModel::where('email', $email)->get()->first();
        }else{
            $this->contacto=TrabajadoresModel::where('email', $email)->get()->first();
        }

    }

    public function render()
    {
        return view('livewire.contacto-seleccionado');
    }
}
