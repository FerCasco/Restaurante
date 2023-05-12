<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mercancia as MercanciaModel;
use App\Models\Producto as ProductoModel;
use App\Models\ElaboracionesMercancias as ElaboracionesMercanciasModel;

class Cocina extends Component
{
    /*ingredientes*/
    public $miIngrediente;
    public $mercancias;

    /*productos*/
    public $miProducto;
    public $productos;
    public $productoSeleccionado;

    protected $listeners = ['cargarEmplatado','cargarProductos'];

    public function mount(){
        $this->mercancias=MercanciaModel::all();
        $this->productos=ProductoModel::all();
    }

    //searchs
    public function updatedMiIngrediente()
    {
        $this->productos=ProductoModel::all();
        if($this->miIngrediente!=null){
            return $this->mercancias = MercanciaModel::where('nombre', 'like', '%' . $this->miIngrediente . '%')->get();

        }else{
            $this->mercancias=MercanciaModel::all();
        }
    }

    public function updatedMiProducto()
    {
        if($this->miProducto!=null){
            return $this->productos = ProductoModel::where('nombre', 'like', '%' . $this->miProducto . '%')->get();

        }else{
            $this->productos=ProductoModel::all();
        }
    }

    //clicks
    public function cargarProductos($idMercancia)
    {
        //todas las mercancias en ingredientesElab con su respectivo idElaboracion
        $mercanciasElab = ElaboracionesMercanciasModel::where('idMercancia', $idMercancia)->get();

        $this->productos=[];

        if($mercanciasElab!=null){
            //coger las elaboraciones distintas que puede tener mi producto seleccionado
            $recetasElaMer=$mercanciasElab->groupBy('idElaboracion');

            foreach ($recetasElaMer as $receta){
                //coger mis productos que tengan ese id de elaboración
                $productoReceta = ProductoModel::where('idElaboraciones', $receta[0]->idElaboracion)->get()->first();
                array_push($this->productos, $productoReceta);
            }
        }
    }

    public function cargarEmplatado($idProducto)
    {
        $this->productoSeleccionado=ProductoModel::where('id', $idProducto)->get()->first();
    }

    /*public function productoSeleccionadoNull()
    {
        $this->productoSeleccionado = null;
    }*/

    public function render()
    {
        return view('livewire.cocina');
    }
}
