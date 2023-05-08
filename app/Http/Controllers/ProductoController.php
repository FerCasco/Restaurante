<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function show()
    {
        $productosList = Producto::all();
        //return response()->json($productos); Funciona pero no muestra


        /*Funcionaba lo de arriba solo q no hay datos*/
        $productos=array();
        foreach ($productosList as $p){
            array_push($productos,array($p["nombre"],intval($p["precio"])));
        }
        return response()->json($productos);
    }
}
