<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaComanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'idMesa',
        'idTrabajador',
        'idProducto',
        'cantidad',
        'enviado',
    ];
}
