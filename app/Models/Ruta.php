<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruta extends Model
{    
    use HasFactory, SoftDeletes;

    protected $table = 'gt_rutas';

    protected $fillable = [
        'idtramite', 'idproc_origen', 'idproc_destino', 'etiqueta'
    ];
}
