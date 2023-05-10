<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DatosAlmacenados extends Component
{
    public $componenteActivo;
    
    protected $listeners = ['componenteActivar'];
    public function componenteActivar($nombre)
    {
        $this->componenteActivo = $nombre;
    }
    public function render()
    {
        return view('livewire.datos-almacenados');
    }
}
