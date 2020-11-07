<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoAutoridad extends Model
{
    use HasFactory;

    protected $table = 'gt_cargos_autoridades';

    protected $fillable = [
        'idcargo', 'idautoridad', 'fecha_inicio', 'fecha_fin', 'condicion'
    ];
}
