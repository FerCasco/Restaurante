<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elaboraciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'receta',
    ];
}
