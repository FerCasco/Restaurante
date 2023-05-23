<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mercancia as MercanciaModel;

class Graficas extends Component
{
    public $grafica;
    public $mercancias;
    public $lista;

    public function verGrafica($nombre, $script, $listaParam)
    {
        $this->grafica = $nombre;  
        $this->lista=$listaParam;      
        $this->emit($script, $this->lista);
    }
    public function graficaCantidadActual()
    {
        $this->mercancias = MercanciaModel::all();
        $this->verGrafica("cantidadActual","ejecutarScript",$this->mercancias);
    }
    public function render()
    {
        return view('livewire.graficas');
    }
}
