<?php

namespace App\Http\Livewire;

use App\Models\Mercancia;
use App\Models\Proveedores;
use App\Models\Tipo;
use Livewire\Component;

class NewMercancia extends Component
{
    public $nombreMercancia;
    public $cantidadMercancia;
    public $stockMinimoMercancia;
    public $stockMaximoMercancia;
    public $precioUnidadMercancia;
    public $newMercancia;
    public $tipoMercancia;
    public $proveedorMercancia;
    public $tipos;
    public $proveedores;
    public function mount()
    {
        $this->tipos = Tipo::all();
        $this->proveedores = Proveedores::all();
    }
    public function render()
    {
        return view('livewire.new-mercancia');
    }
    public function newMercancia()
    {
        $this->newMercancia = new Mercancia;

        if ($this->nombreMercancia != '') {
            $this->newMercancia->nombre = $this->nombreMercancia;
        }
        if ($this->cantidadMercancia != '') {
            $this->newMercancia->cantidadActual = $this->cantidadMercancia;
        }
        if ($this->stockMinimoMercancia != '') {
            $this->newMercancia->stockMin = $this->stockMinimoMercancia;
        }
        if ($this->stockMaximoMercancia != '') {
            $this->newMercancia->stockMax = $this->stockMaximoMercancia;
        }
        if ($this->precioUnidadMercancia != '') {
            $this->newMercancia->precioUnidad = $this->precioUnidadMercancia;
        }
        $this->newMercancia->idTipos = $this->tipoMercancia;
        $this->newMercancia->idProveedor = $this->proveedorMercancia;

        $this->newMercancia->save();
        session()->flash('message', 'Mercancía creada correctamente');
    }
    public function dismissToast()
    {
        session()->forget('message');
    }
}
