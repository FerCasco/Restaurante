<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mercancia as MercanciaModel;
use App\Models\Producto as ProductoModel;
use App\Models\ElaboracionesMercancias as ElaboracionesMercanciasModel;
use App\Models\LineasComanda as LineasComandaModel;

class Graficas extends Component
{
    public $grafica;
    public $lista;

    public function verGrafica($nombre, $script, $listaParam)
    {
        $this->grafica = $nombre;
        $this->lista=$listaParam;
        $this->emit($script, $this->lista);
    }

    public function graficaCantidadActual()
    {
        $mercancias = MercanciaModel::all();
        $this->verGrafica("cantidadActual","ScriptCantidadActual",$mercancias);
    }

    public function graficaRentabilidadPlato()
    {
        //solo encargar sin calcular la mano de obra
        $listaRestaurante=[];
        $listaCliente=[];
        $listaResultados=[];
        $listaPlatoCoste=[3];

        foreach(ProductoModel::all() as $p)
        {
            $objeto=[2];
            $costePlato=0;

            // elaboraciones del producto actual
            $elaboraciones = ElaboracionesMercanciasModel::where('idElaboracion', $p->idElaboraciones)->get();

            foreach ($elaboraciones as $elaboracion)
            {
                $mercancia = MercanciaModel::find($elaboracion->idMercancia);
                $costePlato += $mercancia->precioUnidad * $elaboracion->cantidadMercancia;
            }

            $objeto[0]=$p->nombre;
            $objeto[1]=$costePlato;
            $listaRestaurante[] = $objeto;
        }
        //dd($listaRestaurante);

        foreach(ProductoModel::all() as $p)
        {
            $objeto=[2];

            $objeto[0]=$p->nombre;
            $objeto[1]=$p->precio;
            $listaCliente[] = $objeto;
        }
        //dd($listaCliente);

        for ($i = 0; $i < count($listaRestaurante); $i++) {

            $objeto=[2];
            $objeto[0]=$listaCliente[$i][0];
            $objeto[1] = $listaCliente[$i][1] - $listaRestaurante[$i][1];
            $listaResultados[] = $objeto;
        }

        //dd($listaResultados);

        $listaPlatoCoste['listaRestaurante']=$listaRestaurante;
        $listaPlatoCoste['listaCliente']=$listaCliente;
        $listaPlatoCoste['listaResultados']=$listaResultados;

        //dd($listaPlatoCoste);

        $this->verGrafica("rentabilidadPlato","ScriptRentabilidadPlato",$listaPlatoCoste);
    }

    public function graficaPlatosPreferidos()
    {
        $lineasCom = LineasComandaModel::where('ticket', 1)
        ->groupBy('idProducto')
        ->selectRaw('idProducto, sum(cantidad) as cantidad_total')
        ->get();       

        //dd($lineasCom);

        //Para pasar las cantidades a porcentajes
        $totalCantidades = LineasComandaModel::where('ticket', 1)->sum('cantidad');
        //dd($totalCantidades);

        $PlatosPreferidos=[];
        for ($i = 0; $i < count($lineasCom); $i++) {

            //Busco el nombre del producto
            $producto = ProductoModel::find($lineasCom[$i]['idProducto']);
            $objeto=[2];
            $objeto[0]=$producto->nombre;
            //Paso las cantidades a porcentajes
            $objeto[1] = ($lineasCom[$i]['cantidad_total']/$totalCantidades)*100;
            $PlatosPreferidos[] = $objeto;
        }
        //dd($PlatosPreferidos);
        
        $this->verGrafica("platoPreferido","ScriptPlatoPreferido",$PlatosPreferidos);
    }

    public function render()
    {
        return view('livewire.graficas');
    }

}
