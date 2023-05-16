<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuDiario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'plato',
    ];
}
