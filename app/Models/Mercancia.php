<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mercancia extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'cantidad',
        'precioUnidad',
        'idProveedor',
    ];
}
