<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Mesa;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($tipo, $nombreMesa, $mesa)
    {
        $mesaSeleccionada = Mesa::find($mesa);
        return view('productos', ["productos" => Producto::all(), "tipo" => $tipo, "nombreMesa" => $nombreMesa, "mesa" => $mesaSeleccionada, "rutaActual" => 'productos']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function buscarDetallesCantidad($id)
    {
        /*
        return DetallesProducto::query()->find($id)->cantidad;
        */
    }

    public function detalleProductos($mesa, $productoId)
    {
        $producto = Producto::find($productoId);
        return view('prodcutos', ['mesa' => $mesa]);
    }

    public function aniadirComanda($idMesa, $idTrabajador, $idProducto, $cantidad)
    {     
        $todasComandas = Comanda::all();
        $comandaId = 0;
        foreach ($todasComandas as $comanda) {
            $comandaId = $comanda->id;
        }
        
        \App\Models\Comanda::create([
            'id' => $comandaId,
            'idMesa' => $idMesa,
            'idTrabajador' => $idTrabajador,
            'idProducto' => $idProducto,
            'cantidad'=>$cantidad,
            //campo enviado == 0 dado que cuando se crea la comanda se da por hecho que no se manda automáticamente
            'enviado' => '0',
        ]);

        
        
        
        
        
        
        /*
        $todasComandas = Comanda::all();
        $mesaSeleccionada = Mesa::find($mesa);
        $miProducto = DetallesProducto::find($producto);

        if ((DB::table('comandas')->where('producto_id', $producto)->where('mesa_id', $mesa)->first()) != null) {
            $miComanda = DB::table('comandas')->where('producto_id', $producto)->where('mesa_id', $mesa)->first();
            $miComandaId = $miComanda->id;
            DB::table('comandas')->where('producto_id', $producto)->where('mesa_id', $mesa)->delete();

            \App\Models\Comanda::create([
                "producto_id" => $producto,
                "producto_detalle_id" => $producto,
                "id" => $miComandaId,
                "cantidad_producto" => $miComanda->cantidad_producto + 1,
                "mesa_id" => $mesa,
                "personal_id" => 1,
                "hora" => now()
            ]);
        } else {
            $comandaId = 0;
            foreach ($todasComandas as $comanda) {
                $comandaId = $comanda->id;
            }

            \App\Models\Comanda::create([
                "producto_id" => $producto,
                "producto_detalle_id" => $producto,
                "id" => $comandaId + 1,
                "cantidad_producto" => 1,
                "mesa_id" => $mesaSeleccionada->id,
                "personal_id" => 1,
                "hora" => now()
            ]);

        }
        $miProducto->update([
            "cantidad" => $miProducto->cantidad - 1,
        ]);

        return view('productos', ["productos" => Producto::all(), "tipo" => $tipo, "nombreMesa" => $nombreMesa, "mesa" => $mesaSeleccionada, "rutaActual" => "productos"]);
        */
    }

    public function borrarElemento($comanda, $rutaActual, $tipo, $nombreMesa, $mesa, $producto)
    {
        /*
        $comandaActual = Comanda::find($comanda);
        $miMesa = Mesa::find($mesa);
        $miProducto = DetallesProducto::find($producto);


        if ($comandaActual->cantidad_producto > 1){
            $comandaActual->update([
                'cantidad_producto' => $comandaActual->cantidad_producto -1,
            ]);
        } else {
            $comandaActual->delete();
        }
        $miProducto->update([
            "cantidad" => $miProducto->cantidad + 1,
        ]);

        return view($rutaActual, ["productos" => Producto::all(), "tipo" => $tipo, "nombreMesa" => $nombreMesa, "mesa" => $miMesa, "rutaActual" => $rutaActual]);
        */
    }
    
}
