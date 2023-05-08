<?php

namespace App\Http\Livewire;

use App\Models\Tipo;
use Livewire\Component;

class Tipos extends Component
{
    public $tipos;
    public Tipo $tipo;

    //Como un contructor inicializador
    public function mount()
    {
        $this->tipos = Tipo::all();
        $this->tipo = new Tipo();
    }
    public function render()
    {
        return view('livewire.tipos');
    }
}

