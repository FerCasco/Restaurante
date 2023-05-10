<?php

namespace App\Http\Livewire;

use App\Models\Producto as ProductoModel;
use Livewire\Component;

class MenuDiario extends Component
{
    public $productos;

    public function mount(){
        $this->productos=ProductoModel::all();
    }

    public function reorder($orderedId){

    }

    public function render()
    {
        return view('livewire.menu-diario');
    }
}
