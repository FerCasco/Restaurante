<?php

namespace App\Http\Livewire;

use App\Models\Mercancia;
use Livewire\Component;

class PedidoMercancias extends Component
{
    public $mercancias;
    public $mercanciasBajoStockMinimo;

    public function mount()
    {
        $this->mercanciasBajoStockMinimo = Mercancia::whereRaw('cantidadActual <= stockMin')->get();

        $this->mercancias = Mercancia::all();
      
    }
    public function render()
    {
        return view('livewire.pedido-mercancias', [
            'mercanciasBajoStockMinimo' => $this->mercanciasBajoStockMinimo,
        ]);
    }
}
