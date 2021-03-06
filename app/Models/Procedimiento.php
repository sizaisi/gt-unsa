<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procedimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_procedimientos';

    protected $fillable = [
        'nombre', 
        'idtramite',         
        'idrol', 
        'tipo_rol', 
        'componente', 
        'orden', 
        'descripcion'
    ];
}
