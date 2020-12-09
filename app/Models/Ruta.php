<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'gt_rutas';

    protected $fillable = [
        'idgradoprocedimiento_origen', 'idgradoprocedimiento_destino', 'etiqueta', 'condicion'
    ];
}
