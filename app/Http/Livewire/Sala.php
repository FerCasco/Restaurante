<?php

namespace App\Http\Livewire;

use App\Models\Sala as SalaModel;
use Livewire\Component;

class Sala extends Component
{
    public $salas;
    public SalaModel $sala;

    //Como un contructor inicializador
    public function mount()
    {
        $this->salas=SalaModel::all();
        $this->sala= new SalaModel();
    }
    public function render()
    {
        return view('livewire.sala');
    }
}
