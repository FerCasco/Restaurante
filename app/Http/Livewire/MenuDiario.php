<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto as ProductoModel;
use App\Models\MenuDiario as MenuDiarioModel;
use App\Models\Familia as FamiliaModel;

class MenuDiario extends Component
{
    public $productos;
    public $menu;
    public MenuDiarioModel $m;
    public $miComida;
    protected $listeners = ['InteractuarMenu'];

    public function mount()
    {
        $this->productos = ProductoModel::all();
        $this->menu = MenuDiarioModel::all();

        if ($this->menu != null) {
            $this->productos = ProductoModel::whereNotIn('nombre', function ($query) {
                $query->select('nombre')->from('menu_diarios');
            })->get();
        }
    }

    public function updatedMiComida()
    {
        if ($this->miComida != null) {
            return $this->productos = ProductoModel::whereNotIn('nombre', function ($query) {
                $query->select('nombre')->from('menu_diarios');
            })->where('nombre', 'like', '%' . $this->miComida . '%')->get();

        } else {
            $this->mount();
        }
    }

    public function InteractuarMenu($datos)
    {
        $m = new MenuDiarioModel();

        if ($datos['destino'] == "Comidas" ) {
            $m = MenuDiarioModel::where('nombre', $datos['data'])->first();
            //Control de error de si se saca y entra de nuevo el producto en comidas
                if($m!=null){
                    $m->delete();
                }
        } else {

            $m->nombre = $datos['data'];
            $m->plato = $datos['destino'];

            //Para poder mover el registro de menú a otra familia
            $entrar=true;
            foreach ($this->menu as $r){
                if($r->nombre==$datos['data']){
                    if ($datos['destino'] == "Entrantes" || $datos['destino'] == "Primeros" || $datos['destino'] == "Segundos" || $datos['destino'] == "Postres")
                    {
                        $r->plato = $m->plato;
                        $r->save();
                    }else
                    {
                        //Por si nos ponemos encima de otro registro de menú coger su familia, no el nombre
                        $mInferior = MenuDiarioModel::where('nombre', $datos['destino'])->first();

                        //si es en el div de comidas y nos ponemos encima de otro producto
                        if($mInferior==null){
                            $r->delete();
                        }else{
                            $familia = $mInferior->plato;
                            $r->plato = $familia;
                            $r->save();
                        }                        
                    }

                    
                    $entrar=false;
                }
            }

            //si no tengo ese producto dentro de mi menú
            if($entrar==true){
                if ($datos['destino'] == "Entrantes" || $datos['destino'] == "Primeros" || $datos['destino'] == "Segundos" || $datos['destino'] == "Postres") {

                    $m->save();
                    $this->m = $m;
                } else {
                    //Por si nos ponemos encima de otro registro de menú coger su familia, no el nombre
                    $mInferior = MenuDiarioModel::where('nombre', $datos['destino'])->first();
                                       
                        $familia = $mInferior->plato;
                        $m->plato = $familia;
                        $m->save();
                    
                    
                }
            }

        }
        $this->mount();
    }


    public function render()
    {
        return view('livewire.menu-diario');
    }
}
