<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reserva as ReservaModel;
use App\Models\Mesa as MesaModel;

class Reserva extends Component
{

    public $mesas;
    public $miReserva;


    protected $rules = [
        'miReserva.nombre' => 'required|string|min:1',
        'miReserva.comensales' => 'required',
        'miReserva.hora' => 'required',
        'miReserva.fecha' => 'required',
        'miReserva.idMesa' => 'required',
    ];

    public function mount()
    {
        $miReserva = new ReservaModel();
        $this->mesas=MesaModel::all();
    }

    public function reservar(){
        $this->validate();
        //dd($this->miReserva);//me llegaba array

        $reserva = new ReservaModel();
        $reserva->nombre = $this->miReserva['nombre'];
        //dd( $this->miReserva['nombre']);
        $reserva->apellidos = $this->miReserva['apellidos'];
        $reserva->fecha = $this->miReserva['fecha'];
        $reserva->comensales = $this->miReserva['comensales'];
        $reserva->hora = $this->miReserva['hora'];
        $reserva->idMesa = $this->miReserva['idMesa'];
        $reserva->telefono = $this->miReserva['telefono'];
        $reserva->anotaciones = $this->miReserva['anotaciones'];

        $reserva->save();

        //$this->emitUp('cambiar',null);
    }

    public function render()
    {
        return view('livewire.reserva');
    }

}
