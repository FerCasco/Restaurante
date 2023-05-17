<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'idRol',
        'apellidos',
        'dni',
        'codigoQr',
        'imagenQr'
    ];
}
