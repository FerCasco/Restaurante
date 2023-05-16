<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto as ProductoModel;
use App\Models\MenuDiario as MenuDiarioModel;

class MenuDiario extends Component
{
    public $productos;
    public $menu;

    public function mount(){
        $this->productos=ProductoModel::all();
        $this->menu=MenuDiarioModel::all();
    }

    public function reorder($orderedIds){
        $this->productos = collect($orderedIds)->map(function ($id){
            return collect($this->productos)->where('id', (int) $id)->first();

        })->toArray();
    }


    public function render()
    {
        return view('livewire.menu-diario');
    }
}
