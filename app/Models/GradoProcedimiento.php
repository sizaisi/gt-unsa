<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoProcedimiento extends Model
{
    use HasFactory;

    protected $table = 'gt_grados_procedimientos';

    protected $fillable = [
        'idgradomodalidad', 'idprocedimiento', 'idrol', 'tipo_rol', 'url_formulario', 'orden', 'descripcion', 'condicion'
    ];
}
