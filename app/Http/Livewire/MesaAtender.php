<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mesa as MesaModel;
use App\Models\Familia as FamiliaModel;
use App\Models\Producto as ProductoModel;
use App\Models\Comanda;
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
        // Create a new LineasComanda
        $lineaComanda = LineasComanda::create([
            'idMesa' => $this->mesaAtender->id,
            'trabajador' => $this->trabajador->id,
            'idProducto' => $this->selectedProducto->id,
            'cantidad' => $this->cantidad,
            'enviado' => false,
            'precio' => $this->cantidad * $this->selectedProducto->precio,
        ]);

        // Asociar la línea de comanda con la comanda actual
        $this->comanda->lineasComanda()->save($lineaComanda);

        // Actualizar el precio total de la comanda

        $this->comanda->save();

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function enviarComanda()
    {
    }

    public function resetProductos()
    {
        $this->productos = null;
        $this->showFamilies = true; // Show the families again
    }



    public function render()
    {
        return view('livewire.mesa-atender');
    }
}
