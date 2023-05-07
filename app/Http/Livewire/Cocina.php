<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mercancia as MercanciaModel;
class Cocina extends Component
{
    public $miIngrediente;
    public $mercancias;
    public $menuIngredientes=true;
    public function mount(){
        $this->updatedMiIngrediente();
    }
    public function updatedMiIngrediente()
    {
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
