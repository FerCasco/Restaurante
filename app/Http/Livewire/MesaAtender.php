<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;
use App\Models\Familia as FamiliaModel;
use App\Models\Producto as ProductoModel;

class MesaAtender extends Component
{
    public $mesaAtender;
    public $miLista;
    protected $listeners = ['atenderMesa','cargarProductos','añadirComanda'];
    public $cargar;

    public function mount($idMesa)
    {
       $this->atenderMesa($idMesa);
    }
    public function atenderMesa($idMesa)
    {      
        $this->mesaAtender=MesaModel::where('id', $idMesa)->get()->first();
            $this->miLista = FamiliaModel::all();  
        /*if(!isset($this->cargar)){
            $this->mesaAtender=MesaModel::where('id', $idMesa)->get()->first();
            $this->miLista = FamiliaModel::all();  
        }else{
            dd($this->miLista);
        }*/
    }

    public function cargarProductos($idFamilia)
    { 
        $productos= ProductoModel::where('idFamilia', $idFamilia)->get(); 
        $this->miLista = $productos;
        //dd(class_basename($this->miLista[0]));

        //$this->render();

        /*$this->cargar=true;
        $this->mount($idFamilia);*/
    }

    public function añadirComanda($idProducto)
    {
        
    }
    public function render()
    {
        return view('livewire.mesa-atender');
    }
}
