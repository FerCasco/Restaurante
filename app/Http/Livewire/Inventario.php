<?php

namespace App\Http\Livewire;

use App\Models\Tipo;
use Livewire\Component;

class Inventario extends Component
{
    public $componenteActivo;
    public $idTipo;
    public $idMercancia;
    public $tipos;
    protected $listeners = ['enviarTipoId','gestionarMercancia','addMercancia', 'newMercancia'];

    public function enviarTipoId($idTipo)
    {
        $this->idTipo=$idTipo;
        $this->componenteActivar('gestionar-almacen');
    }

    public function addMercancia(){
        $this->componenteActivar('pedido-mercancias');
    }

    public function newMercancia(){
        $this->componenteActivar('new-mercancia');
    }
    public function componenteActivar($nombre)
    {
        $this->componenteActivo = $nombre;
    }
    public function render()
    {
        $this->tipos = Tipo::all();
        return view('livewire.inventario');
    }
}
