<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Spatie\Permission\Traits\HasRoles;

class Trabajadores extends Model
{
    use HasFactory;
    use HasRoles;

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
