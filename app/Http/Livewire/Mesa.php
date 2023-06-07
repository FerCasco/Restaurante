<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;
use App\Models\Sala as SalaModel;


class Mesa extends Component
{
    public $mesas;
    public $miMesa;
    public $salasMesa;
    protected $listeners = ['enviarSalaId' => 'actualizarSalaSeleccionada'];
    public $modalVisibleMesa;

    //
    public $selectSala;

    protected $rules = [
        'miMesa.capacidad' => 'required',
        'miMesa.comensales' => 'required',
        'miMesa.idSala' => 'required',
    ];

    //Como un contructor inicializador
    public function mount($idSala)
    {
        $this->actualizarSalaSeleccionada($idSala);
    }    

    public function actualizarSalaSeleccionada($idSala)
    {
        $this->mesas=MesaModel::where('idSala', $idSala)->get();
        $this->salasMesa=SalaModel::all();
        $this->miMesa = new MesaModel();
    }

    public function verModalMesa($ver)
    {
        $this->modalVisibleMesa = $ver;
    }

    public function agregarMesa()
    {      
        $this->validate(); 

        $mesa = new MesaModel();
        $mesa->capacidad = $this->miMesa['capacidad'];
        $mesa->comensales = $this->miMesa['comensales'];
        dd($this->selectSala);
        $mesa->idSala = $this->selectSala;
        
        $caracterNomMesa = substr($this->selectSala, 0, 1);

        //busco el nombre de la última mesa de esa sala
        $mesas=MesaModel::where('idSala', $this->selectSala)->get();
        $listNumNombreMesa = [];
        foreach($mesa as $m)
        {
            $listNumNombreMesa = substr($m->nombre, 0, 1);
        }
        dd($listNumNombreMesa );
        $sala->save();
    }

    public function render()
    {
        return view('livewire.mesa');
    }
}
