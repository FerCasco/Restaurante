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
    public $miComida;
    protected $listeners = ['InteractuarMenu'];

    public function mount(){
        $this->productos=ProductoModel::all();
        $this->menu=MenuDiarioModel::all();

        if($this->menu!=null){
            $this->productos = ProductoModel::whereNotIn('nombre', function ($query) {
                $query->select('nombre')->from('menu_diarios');
            })->get();
        }
    }

    public function updatedMiComida()
    {
        if($this->miComida!=null){
            return $this->productos =  ProductoModel::whereNotIn('nombre', function ($query) {
                $query->select('nombre')->from('menu_diarios');
            })->where('nombre', 'like', '%' . $this->miComida . '%')->get();

        }else{
            $this->mount();
        }
    }

    public function InteractuarMenu($datos){
        $m = new MenuDiarioModel();

        if($datos['destino']=="Comidas" || $datos['destino']=="")
        { 
            $m=MenuDiarioModel::where('nombre',$datos['data'])->first()->delete();
        }else{
            $m->nombre = $datos['data'];
            $m->plato = $datos['destino'];
            $m->save();
            $this->m = $m;
    
        }
        
        $this->mount();
    }


    public function render()
    {
        return view('livewire.menu-diario');
    }
}
