<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reserva as ReservaModel;

class DatosAlmacenados extends Component
{
    public $componenteActivo;
    public $reservas;

    public function mount(){
        $this->reservas=ReservaModel::all();
    }

    public function cambiar($nombre)
    {
        $this->componenteActivo=$nombre;
        //$this->render();
    }
    public function render()
    {
        return view('livewire.datos-almacenados');
    }
}
