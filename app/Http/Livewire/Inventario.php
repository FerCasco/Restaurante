<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inventario extends Component
{
    public $componenteActivo;
    public $idTipo;
    public $idMercancia;
    protected $listeners = ['enviarTipoId','gestionarMercancia','addMercancia'];

    public function enviarTipoId($idTipo)
    {
        $this->idTipo=$idTipo;
        $this->componenteActivar('gestionar-almacen');
    }

    public function addMercancia(){
        $this->componenteActivar('pedido-mercancias');
    }
    public function componenteActivar($nombre)
    {
        $this->componenteActivo = $nombre;
    }
    public function render()
    {
        return view('livewire.inventario');
    }
}
