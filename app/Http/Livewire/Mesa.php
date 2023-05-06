<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;


class Mesa extends Component
{
    public $mesas;
    protected $listeners = ['enviarSalaId' => 'actualizarSalaSeleccionada'];


    //Como un contructor inicializador
    public function mount($idSala)
    {
        $this->actualizarSalaSeleccionada($idSala);
    }

    public function actualizarSalaSeleccionada($idSala)
    {
        $this->mesas=MesaModel::where('idSala', $idSala)->get();
    }
    public function render()
    {
        return view('livewire.mesa');
    }
}
