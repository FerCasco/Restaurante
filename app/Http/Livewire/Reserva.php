<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reserva as ReservaModel;
use App\Models\Mesa as MesaModel;

class Reserva extends Component
{   

    public $mesas;

    public $miReserva;

    //Propiedades para crear reservas
    public $nombre;
    public $apellidos;
    public $fecha;
    public $numPersonas;
    public $horas;
    public $telefono;
    public $idMesa;
    public $anotaciones;

    public function mount()
    {
        $this->mesas=MesaModel::all();
    }

    public function addProveedor(){
        $miReserva = new ReservaModel();
        $miReserva->nombre = $this->nombre;
        $miReserva->apellidos = $this->apellidos;
        $miReserva->telefono = $this->telefono;
        $miReserva->comensales = $this->numPersonas;        
        $miReserva->hora = $this->horas;
        $miReserva->fecha = $this->fecha;
        $miReserva->idMesa = $this->idMesa;
        $miReserva->anotaciones = $this->anotaciones;
        $miReserva->save();
    }

    public function render()
    {
        return view('livewire.reserva');
    }
}
