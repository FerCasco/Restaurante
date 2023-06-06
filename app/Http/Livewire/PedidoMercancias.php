<?php

namespace App\Http\Livewire;

use App\Models\Mercancia;
use App\Models\LineasPedido;
use App\Models\Pedido;
use Livewire\Component;

class PedidoMercancias extends Component
{
    public $mercanciasBajoStockMinimo;
    public $inputValues;
    public $lineas = [];

    public function mount()
    {
        $this->mercanciasBajoStockMinimo = Mercancia::whereRaw('cantidadActual <= stockMin')->get();
    }

    public function createPedido()
    {
        $pedido = new Pedido();
        $pedido->fechaPedido = date('H:i');
        $pedido->total = 0;
        $pedido->save();
        $total = 0;
        foreach ($this->inputValues as $mercanciaId => $newQuantity) {
            $mercancia = Mercancia::find($mercanciaId);
            $lineaPedido = new LineasPedido([
                'cantidad' => $newQuantity,
                'precioUnidad' => $mercancia->precioUnidad,
                'precioTotal' => $newQuantity * $mercancia->precioUnidad,
                'idPedido' => $pedido->id,
                'idProveedor' => $mercancia->idProveedor,
                'idMercancia' => $mercancia->id,
            ]);
            $lineaPedido->save();

            $total += $lineaPedido->precioTotal; // Accumulate the precioTotal value

            // Update the cantidadActual value of the associated Mercancia model
            $mercancia->cantidadActual += $newQuantity;
            $mercancia->save();

            session()->flash('message', 'Nueva línea de pedido: añadidos ' . $newQuantity . ' unidades de ' . $mercancia->nombre);
            $this->resetInput($mercanciaId);
        }

        $pedido->total = $total; // Assign the total sum to the total property of Pedido
        $pedido->save();

        session()->flash('message', 'Nuevo pedido creado con éxito');
        $this->lineas = [];
        $this->inputValues = [];
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
