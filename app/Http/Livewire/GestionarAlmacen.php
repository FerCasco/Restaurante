<?php

namespace App\Http\Livewire;

use App\Models\Mercancia;
use App\Models\Tipo;
use Livewire\Component;

class GestionarAlmacen extends Component
{
    public $mercancias;
    public $tipo;
    protected $listeners = ['enviarTipoId'=>'gestionarTipo'];

    public function mount($idTipo)
    {
        $this->gestionarTipo($idTipo);
    }

    public function gestionarTipo($idTipo)
    {
        $this->tipo = Tipo::where('id',$idTipo)->get()->first();
        $this->mercancias=Mercancia::where('tipo', $idTipo)->get();
    }
    public function render()
    {
        return view('livewire.gestionar-almacen');
    }
}
