<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mercancia as MercanciaModel;
use App\Models\Producto as ProductoModel;

class Cocina extends Component
{
    public $miIngrediente;
    public $mercancias;
    public $productos;
    public $menuIngredientes=true;
    public function mount(){
        $this->updatedMiIngrediente();
    }
    public function updatedMiIngrediente()
    {
        $this->productos=ProductoModel::all();
        if($this->miIngrediente!=null){
            $menuIngredientes=true;
            return $this->mercancias = MercanciaModel::where('nombre', 'like', '%' . $this->miIngrediente . '%')->get();

        }else{
            $this->mercancias=MercanciaModel::all();
        }
    }
    public function render()
    {
        return view('livewire.cocina');
    }
}
