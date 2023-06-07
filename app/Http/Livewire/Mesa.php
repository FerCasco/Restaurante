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

    //agregarMesa
    public $selectSala;
    public $capacidadMesa;

    //Editar
    public $allMesas;
    public $selectMesa;
    public $capacidadMesaE;

    //Eliminar
    public $mesaEliminar;
    public function mount($idSala)
    {
        $this->actualizarSalaSeleccionada($idSala);
    }

    public function actualizarSalaSeleccionada($idSala)
    {
        $this->mesas=MesaModel::where('idSala', $idSala)->get();
        $this->salasMesa = SalaModel::all();
        $this->miMesa = new MesaModel();
        $this->allMesas = MesaModel::all();
    }

    public function verModalMesa($ver)
    {
        $this->modalVisibleMesa = $ver;
    }

    public function agregarMesa()
    {
        $mesa = new MesaModel();
        $mesa->capacidad = $this->capacidadMesa;
        $mesa->comensales = 0;
        $mesa->idSala = $this->selectSala;

        $sala = SalaModel::where('id', $this->selectSala)->get()->first();
        $caracterNomMesa = substr($sala->nombre, 0, 1);
        $mesas = MesaModel::where('idSala', $this->selectSala)->get();
        $nombreMesa = $caracterNomMesa . (sizeof($mesas) +1);
        $mesa->nombre = $nombreMesa;

        $mesa->save();
    }

    public function editarMesa(){

        $mesa = MesaModel::where('id', $this->selectMesa)->get()->first();
        $mesa->capacidad = $this->capacidadMesaE;
        $mesa->save();
    }

    public function eliminarMesa()
    {
        $mesa = MesaModel::where('id', $this->mesaEliminar)->get()->first();
        $mesa->delete();
    }

    public function render()
    {
        return view('livewire.mesa');
    }
}
