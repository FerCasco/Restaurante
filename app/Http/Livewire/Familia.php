<?php

namespace App\Http\Livewire;

use App\Models\Familia as ModelsFamilia;
use Livewire\Component;
use App\Models\Mesa as MesaModel;


class Familia extends Component
{
    public $familias;
    public ModelsFamilia $familia;


    //Como un contructor inicializador
    public function mount($id)
    {
        $this->familias=ModelsFamilia::all();
        $this->familia= new ModelsFamilia();
    }
}
