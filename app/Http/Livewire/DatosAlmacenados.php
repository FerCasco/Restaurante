<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DatosAlmacenados extends Component
{
    public $componenteActivo;
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
