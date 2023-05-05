<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Prueba extends Component
{   
    public $mensaje;
    public function render()
    {
        return view('livewire.prueba');
    }

    public function mount($mensaje){
        $this->mensaje = $mensaje;
    }
}
