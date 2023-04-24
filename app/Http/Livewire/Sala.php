<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sala as SalaModel;

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

    public function verMesas($id)
    {
        return redirect()->route('misMesas', ['id' => $id]);
    }
    public function render()
    {
        return view('livewire.sala');
    }
}
