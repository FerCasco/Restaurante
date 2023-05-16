<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto as ProductoModel;
use App\Models\MenuDiario as MenuDiarioModel;

class MenuDiario extends Component
{
    public $productos;
    public $menu;
    public MenuDiarioModel $m;
    protected $listeners = ['CrearMenu'];

    public function mount(){
        $this->productos=ProductoModel::all();
        $this->menu=MenuDiarioModel::all();

        if($this->menu!=null){
            $this->productos = ProductoModel::whereNotIn('nombre', function ($query) {
                $query->select('nombre')->from('menu_diarios');
            })->get();
        }
    }
    public function CrearMenu($datos){
        $m = new MenuDiarioModel();
        $m->nombre = $datos['data'];
        $m->plato = $datos['destino'];
        $m->save();
        $this->m = $m;

        $this->mount();
    }


    public function render()
    {
        return view('livewire.menu-diario');
    }
}
