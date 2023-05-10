<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reserva as ReservaModel;
class Reserva extends Component
{

    public $dia;
    public $reservas;

    public function mount(){
        $this->reservas=ReservaModel::all();
    }
    protected $listeners = ['diaSeleccionado'];

    public function diaSeleccionado($diaSelect)
    {
        dd($diaSelect);
        //$this->dia=$diaSelect;
    }

    public function render()
    {
        return view('livewire.reserva');
    }
}
