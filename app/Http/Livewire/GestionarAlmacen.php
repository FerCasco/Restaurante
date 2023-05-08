<?php

namespace App\Http\Livewire;

use App\Models\Tipo;
use Livewire\Component;

class GestionarAlmacen extends Component
{
    public $tipo;
    public $mercancias;
    protected $listeners = ['gestionarTipo'];

    public function mount($idTipo)
    {
        $this->gestionarTipo($idTipo);
    }

    public function gestionarTipo($idTipo)
    {
        $this->mercancias = \App\Models\Familia::all();
        $this->tipo=Tipo::where('id', $idTipo)->get()->first();
    }
    public function render()
    {
        return view('livewire.gestionar-almacen');
    }
}
