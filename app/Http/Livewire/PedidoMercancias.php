<?php

namespace App\Http\Livewire;

use App\Models\Mercancia;
use Livewire\Component;


class PedidoMercancias extends Component
{
    public $mercanciasBajoStockMinimo;
    public $inputValues;

    public function mount()
    {
        $this->mercanciasBajoStockMinimo = Mercancia::whereRaw('cantidadActual <= stockMin')->get();
    }

    public function updateQuantity($mercanciaId, $newQuantity)
    {
        $mercancia = Mercancia::find($mercanciaId);
        $mercancia->cantidadActual += $newQuantity;
        $mercancia->save();
        session()->flash('message', 'Nuevo Pedido: añadidos ' . $newQuantity . ' unidades de ' . $mercancia->nombre);
        // Emitir el evento toastMessage

        // Actualizar la colección de mercancías con la nueva cantidad
        $this->mercanciasBajoStockMinimo = Mercancia::whereRaw('cantidadActual <= stockMin')->get();
    }
    public function dismissToast()
    {
        session()->forget('message');
    }
    public function resetInput($mercanciaId)
{
    $this->inputValues[$mercanciaId] = 0;
}
    public function render()
    {
        return view('livewire.pedido-mercancias');
    }
}
