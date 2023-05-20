<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineasComanda extends Model
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
