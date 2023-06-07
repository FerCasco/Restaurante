<?php

namespace App\Http\Livewire;

use App\Models\Sala as SalaModel;
use Livewire\Component;

class Sala extends Component
{
    public $salas;
    public $miSala;
    public $modalVisible;

    //variables de editar
    public $idSala;
    public $nombreSala;
    
    protected $rules = [
        'miSala.nombre' => 'required|string|min:1',
    ];

    //Como un contructor inicializador
    public function mount()
    {
        $this->salas=SalaModel::all();
        $this->miSala= new SalaModel();
    }
    public function verModal($ver)
    {
        $this->modalVisible = $ver;
    }

    public function agregarSala()
    {      
        $this->validate();  
        $sala = new SalaModel();
        $sala->nombre = $this->miSala['nombre'];
        //dd($sala->nombreSala);
        $sala->save();

        //$this->mount();
        //$this->render();
        //$this->salas=SalaModel::all();
        //$this->emit('$refresh');

        // Emitir el evento al componente padre
        //$this->emit('actualizar');
    }

    public function eliminarSala()
    {      
        $nomBorrar = $this->miSala['nombre'];
        $sala = SalaModel::where('nombre', $nomBorrar)->get()->first();
        $sala->delete();

        //$this->render();
    }

    /*public function updatedMiSalaEditar(){
        dd($this->miSalaEditar);
        if($this->miSalaEditar!=null)
        {
            //$this->miSala['nombre'] = $this->miSalaEditar['nombre'];
        }
    }*/

    public function editarSala(){

        /*$idSala = $this->miSala['id'];
        dd($idSala);
        $sala = SalaModel::where('id', $idSala)->get()->first();
        $sala->nombre = $this->miSala['nombre'];
        $sala->save();*/

        
        $sala = SalaModel::where('id', $this->idSala)->get()->first();
        $sala->nombre = $this->nombreSala;
        $sala->save();
    } 

    public function render()
    {
        return view('livewire.sala');
    }
}
