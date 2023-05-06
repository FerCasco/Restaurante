<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $componenteActivo;
    public $idSala;
    public $idMesa;

    protected $listeners = ['enviarSalaId','componenteMenuLateral','atenderMesa',];

    public function enviarSalaId($idSala)
    {
        $this->idSala=$idSala;
        $this->componenteActivar('mesa');
    }

    public function componenteMenuLateral($nombre)
    {
        $this->componenteActivar($nombre);
    }

    public function atenderMesa($idMesa)
    {
        $this->idMesa=$idMesa;
        $this->componenteActivar('mesaAtender');
    }
    public function componenteActivar($nombre)
    {
        $this->componenteActivo = $nombre;
    }
    public function render()
    {
        return view('livewire.main');
    }
}
