<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;
use App\Models\Familia as FamiliaModel;
use App\Models\Producto as ProductoModel;
use App\Models\Comanda;
use App\Models\Ticket;
use App\Models\LineasComanda;
use Illuminate\Support\Facades\Auth;

class MesaAtender extends Component
{
    public $mesaAtender;
    public $familias;
    public $productos;
    public $showFamilies = true;
    public $showModal = false;
    public $selectedProducto;
    public $cantidad;
    public $comanda;
    public $showComanda = false;
    public $lineasComanda;
    public $trabajador;

    protected $listeners = ['atenderMesa', 'cargarProductos'];


    public function mount($idMesa)
    {
        $this->atenderMesa($idMesa);
    }

    public function atenderMesa($idMesa)
    {
        $this->trabajador = session('user');
        if (!Comanda::find($idMesa)) {
            $this->comanda = new Comanda();
            $this->comanda->id = $idMesa;
            $this->comanda->precioTotal = 0;
            $this->comanda->save();
        } else {
            $this->comanda = Comanda::find($idMesa);
        }
        $this->familias = FamiliaModel::all();
        $this->mesaAtender = MesaModel::where('id', $idMesa)->first();
    }

    public function cargarProductos($idFamilia)
    {
        $this->productos = ProductoModel::where('idFamilia', $idFamilia)->get();
        $this->showFamilies = false;
    }
    public function addComanda($idProducto)
    {
        $this->selectedProducto = ProductoModel::where('id', $idProducto)->get()->first();
        $this->showModal = true;
        $this->cantidad = null;
    }

    public function submitCantidad()
    {
        $lineaComanda = LineasComanda::where('idMesa', $this->mesaAtender->id)
            ->where('idProducto', $this->selectedProducto->id)
            ->where('ticket', 0)
            ->first();

        if ($lineaComanda) {
            $lineaComanda->cantidad = $lineaComanda->cantidad + $this->cantidad;
            $lineaComanda->precio = $lineaComanda->cantidad * $this->selectedProducto->precio;
            $lineaComanda->save();
            $this->closeModal();
        } else {
            $lineaComanda = LineasComanda::create([
                'idMesa' => $this->mesaAtender->id,
                'trabajador' => $this->trabajador->id,
                'idProducto' => $this->selectedProducto->id,
                'cantidad' => $this->cantidad,
                'enviado' => false,
                'ticket' => 0,
                'fechaTicket' => "",
                'precio' => $this->cantidad * $this->selectedProducto->precio,
            ]);
            

            $this->comanda->save();

            $this->closeModal();
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function enviarComanda()
    {
        date_default_timezone_set('Europe/Madrid');
        $ticket = Ticket::where('id', $this->mesaAtender->id)->get()->first();

        $ticket->fechaTicket =  date('d-m-y h:i:s');
  
        $ticket->save();
        $lineas = LineasComanda::where('idMesa', $this->mesaAtender->id)->where('ticket', 0)->get();
        foreach ($lineas as $linea) {
            $linea->ticket = 1;
            $linea->fechaTicket = $ticket->fechaTicket;
            $linea->save();
        }
        //Imprimir ticket o gestionarlo de alguna forma




        $this->comanda->precioTotal = 0;
        $this->comanda->save();
    }
    public function deleteComanda()
    {
    }
    public function resetProductos()
    {
        $this->productos = null;
        $this->showFamilies = true; // Show the families again
    }
    public function verComanda()
    {
        $this->lineasComanda = LineasComanda::where('idMesa', $this->mesaAtender->id)->where('ticket',0)->get();
        $this->showComanda = true;
    }
    public function closeComanda()
    {
        $this->showComanda = false;
    }
    public function render()
    {
        return view('livewire.mesa-atender');
    }
}
