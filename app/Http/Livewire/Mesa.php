<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;


class Mesa extends Component
{
    public $mesas;
    public $idSala;
    public MesaModel $mesa;


    //Como un contructor inicializador
    public function mount($id)
    {
        $this->idSala=$id;
        $this->mesas=MesaModel::all();
        $this->mesa= new MesaModel();
    }

    public function render()
    {
        return view('livewire.mesa');
    }
}
