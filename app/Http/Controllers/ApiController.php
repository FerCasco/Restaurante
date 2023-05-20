<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\LineasComanda;
use App\Models\Mesa;
use App\Models\MesaProducto;
use App\Models\Producto;
use App\Models\Sala;
use App\Models\Trabajadores;
use Illuminate\Http\Request;
/*
 * Objetos:
 * Sala, Mesa, Producto, MesaProducto, Comanda, Reserva,
 * LineaComanda, Usuario
 */

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => 'Para recibir datos use el método show. Ruta: http://localhost:8000/api/getResources/show',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $nuevaLinea = new LineasComanda();
        $nuevaLinea->id = $request->id;
        $nuevaLinea->idMesa = $request->idMesa;
        $nuevaLinea->idTrabajador = $request->idTrabajador;
        $nuevaLinea->cantidad = $request->cantidad;
        $nuevaLinea->idProducto = $request->idProducto;
        $nuevaLinea->enviado = 1;

        $nuevaLinea->save();

        return response()->json([
            'message' => 'Linea creada correctamente.',
            'info' => 'Datos enviados: id = ' . $request->id . ', idMesa = ' . $request->idMesa . ', idTrabajador = ' . $request->idTrabajador
            . ', cantidad = ' . $request->cantidad . ', idProducto = ' . $request->idProducto
        ]);
    }

    /**
     * Devuelve un array de datos en un orden específico:
     * 1-salas
     * 2-mesas
     * 3-productos
     * 4-comandas
     * 5-usuarios (con la imagen del qr codificada en UTF-8)
     * 6-mesasProducto
     * 7-lineasComanda
     */
    public function show(): \Illuminate\Http\JsonResponse
    {
        /* Variables */
        $usuariosQr = [];
        $salas = Sala::all();
        $mesas = Mesa::all();
        $productos = Producto::all();
        $mesaProducto = MesaProducto::all();
        $comandas = Comanda::all();
        $lineasComanda = LineasComanda::all();
        $usuarios = Trabajadores::all();

        foreach ($usuarios as $usuario) {
            $qr_data = $usuario->imagenQr;
            $usuarioArr = array(
                'id' => $usuario->id,
                'name' => $usuario->nombre,
                'apellidos' => $usuario->apellidos,
                'telefono' => $usuario->telefono,
                'dni' => $usuario->dni,
                'rol' => $usuario->rol,
                'email' => $usuario->email,
                'codigoQr' => $usuario->codigoQr,
                'imagenQr' => utf8_encode($qr_data)
            );

            $usuariosQr[] = $usuarioArr;
        }

        return response()->json([
            'salas'=> $salas,
            'mesas' => $mesas,
            'productos' => $productos,
            'comandas' => $comandas,
            'usuarios' => $usuariosQr,
            'mesasProductos' => $mesaProducto,
            'lineaComanda' => $lineasComanda
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $success = false;

        switch ($request->type){
            case '1':
                $type = 'Comanda';
                if(Comanda::where('id', $request->id)->first()->updateOrFail([$request->param => $request->value]) > 0) $success = true;
                break;
            case '2':
                $type = 'LineaComanda';
                if(LineasComanda::where('id', $request->id)->first()->updateOrFail([$request->param => $request->value]) > 0) $success = true;
                break;
            default:
                return response()->json([
                    'message' => 'No se encuentra un tipo de dato correcto.',
                    'info' => 'Los tipos de datos aceptados son: 1-Comanda, 2-LineaComanda, por favor introduzca uno de estos datos por parámetro.'
                ]);
        }

        if($success){
            return response()->json([
                'message' => 'Elemento con id ' . $request->id . ' actualizado correctamente de la tabla ' . $type . '. Elementos actualizados: ' . $request->param . ' : ' . $request->value
            ]);
        } else {
            return response()->json([
                'message' => 'No ha sido posible actualizar el elemento ' . $request->id . ' de la tabla ' . $type
            ]);
        }
    }

    /**
     * Se hace delete del registro en cuestion dependiendo
     * del tipo de dato, se hace en una tabla o en otra distinta.
     *
     * Tipos:
     * 1-Comandas
     * 2-lineasComanda
     */
    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $success = false;

        switch ($request->type){
            case '1':
                $tipo = 'Comanda';
                if(Comanda::destroy($request->id) > 0) $success = true;
                break;
            case '2':
                $tipo = 'LineaComanda';
                if(LineasComanda::destroy($request->id) > 0) $success = true;
                break;
            default:
                return response()->json([
                    'message' => 'No se encuentra un tipo de dato correcto.',
                    'info' => 'Los tipos de datos aceptados son: 1-Comanda, 2-LineaComanda, por favor introduzca uno de estos datos por parámetro.'
                ]);
        }

        if($success){
            return response()->json([
                'message' => 'Elemento con id ' . $request->id . ' eliminado correctamente de la tabla ' . $tipo
            ]);
        } else {
            return response()->json([
                'message' => 'No se ha podido borrar el elemento con id ' . $request->id . ' de la tabla ' . $tipo
            ]);
        }
    }
}
