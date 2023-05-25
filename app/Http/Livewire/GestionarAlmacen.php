<?php

namespace App\Http\Livewire;

use App\Models\Mercancia;
use App\Models\Tipo;
use Livewire\Component;

class GestionarAlmacen extends Component
{
    public $mercancias;
    public $tipo;
    protected $listeners = ['enviarTipoId' => 'gestionarTipo'];
    public $showModalMercancias = false;
    public $selectedMercancia;

    //Propiedades para crear y actualizar Mercancias
    public $nombreMercancia;
    public $cantidadMercancia;
    public $stockMinimoMercancia;
    public $stockMaximoMercancia;
    public $precioUnidadMercancia;

    public function mount($idTipo)
    {
        $this->gestionarTipo($idTipo);
    }

    public function gestionarTipo($idTipo)
    {
        $this->tipo = Tipo::where('id', $idTipo)->get()->first();
        $this->mercancias = Mercancia::where('idTipos', $idTipo)->get();
    }
    public function openModal($mercanciaId)
    {
        $this->selectedMercancia = Mercancia::find($mercanciaId);
        $this->showModalMercancias = true;
    }
    public function closeModalMercancia()
    {
        $this->showModalMercancias = false;
    }
    public function updateMercancia()
    {
        if ($this->nombreMercancia != '') {
            $this->selectedMercancia->nombre = $this->nombreMercancia;
        }
        if ($this->cantidadMercancia != '') {
            $this->selectedMercancia->cantidadActual = $this->cantidadMercancia;
        }
        if ($this->stockMinimoMercancia != '') {
            $this->selectedMercancia->stockMin = $this->stockMinimoMercancia;
        }
        if ($this->stockMaximoMercancia != '') {
            $this->selectedMercancia->stockMax = $this->stockMaximoMercancia;
        }
        if ($this->precioUnidadMercancia != '') {
            $this->selectedMercancia->precioUnidad = $this->precioUnidadMercancia;
        }

        $this->selectedMercancia->save();

        $this->emitSelf('enviarTipoId', $this->tipo->id); // Trigger the 'enviarTipoId' event to update the displayed mercancias

        $this->showModalMercancias = false;
    }
    public function enviarTipoId($idTipo)
    {
        $this->gestionarTipo($idTipo);
    }
    public function deleteMercancia(Mercancia $mercancia)
    {
        $mercancia->delete();
        $this->mercancias = Mercancia::where('idTipos', $this->tipo->id)->get();
    }
    public function render()
    {
        return view('livewire.gestionar-almacen');
    }
}
