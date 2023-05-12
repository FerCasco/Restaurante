<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElaboracionesMercancias extends Model
{
    use HasFactory;

    /*protected $table = 'elaboraciones_mercancias';*/
    protected $fillable = [
        'id',
        'idMercancia',
        'idElaboracion',
    ];
}
