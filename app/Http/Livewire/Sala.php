<?php

namespace App\Http\Livewire;

use App\Models\Sala as SalaModel;
use Livewire\Component;

class Sala extends Component
{
    public $salas;
    public $miSala;
    public $modalVisible;

    
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

        $nombre = $this->miSala['editar'];
        dd($nombre);
        $sala = SalaModel::where('nombre', $nombre)->get()->first();
        $sala->nombre = $this->miSala['nombre2'];
        $sala->save();
    } 

    public function render()
    {
        return view('livewire.sala');
    }
}
