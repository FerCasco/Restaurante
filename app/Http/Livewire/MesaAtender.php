<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;
use App\Models\Familia as FamiliaModel;
use App\Models\Producto as ProductoModel;

class MesaAtender extends Component
{
    public $mesaAtender;
    //public $familias;
    //public $productos;
    public $cargar;
    //public $miLista;
    protected $listeners = ['atenderMesa','cargarProductos','añadirComanda'];
    public $familias;

    /*public function mount($idMesa)
    {
        $miLista=FamiliaModel::all(); 
        $this->mesaAtender=MesaModel::where('id', $idMesa)->get()->first();

    }public function atenderMesa($idMesa)
    {
        $miLista=[];
        $miLista=FamiliaModel::all();
        $this->mesaAtender=MesaModel::where('id', $idMesa)->get()->first();

    }
    public function cargarProductos($idFamilia)
    {
        $miLista=[];
        $miLista=ProductoModel::all();
    }*/
    


    /*public function mount($idMesa)
    {
       $this->atenderMesa($idMesa);
    }
    public function atenderMesa($idMesa)
    {
        $this->mesaAtender=MesaModel::where('id', $idMesa)->get()->first();
        $this->familias = FamiliaModel::all();

        if($this->cargar==true){
            $this->familias = null;
            dd($this->familias);
        }
    }
    public function cargarProductos($idFamilia)
    {
        $this->productos = ProductoModel::all()->where('id',$idFamilia);
        $this->cargar=true;
        $this->mount($this->mesaAtender->id);
    }*/


    public function mount($idMesa)
    {
       $this->atenderMesa($idMesa);
    }
    public function atenderMesa($idMesa)
    {      
        $this->mesaAtender=MesaModel::where('id', $idMesa)->get()->first();
        $this->familias = FamiliaModel::all();
        /*if(!isset($this->cargar) && $this->cargar!=true )
        { 
            $this->mesaAtender=MesaModel::where('id', $idMesa)->get()->first();
            $this->familias = FamiliaModel::all();
        } */           
    }

    public function cargarProductos($idFamilia)
    { 

        $this->familias = ProductoModel::where('id', $idFamilia)->get();        
        //$this->cargar=true;
        //dd($this->familias );
    }



    public function render()
    {
        return view('livewire.mesa-atender');
    }
}
