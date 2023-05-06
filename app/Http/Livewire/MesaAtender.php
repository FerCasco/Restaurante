<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;

class MesaAtender extends Component
{
    public $mesa;
    public $familias;
    protected $listeners = ['atenderMesa'];

    public function mount($idMesa)
    {
        $this->atenderMesa($idMesa);
    }
    public function atenderMesa($idMesa)
    {
        $this->familias = \App\Models\Familia::all();
        $this->mesa=MesaModel::where('id', $idMesa)->get()->first();
    }
    public function render()
    {
        return view('livewire.mesa-atender');
    }
}
