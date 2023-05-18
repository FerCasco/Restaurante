<?php

namespace App\Http\Controllers;

use App\Models\Mercancia;
use Illuminate\Http\Request;

class MercanciaController extends Controller
{
    public function show()
    {
        $mercancias = Mercancia::all();
        return response()->json($mercancias);
    }
}
