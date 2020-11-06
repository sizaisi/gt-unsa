<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'gt_grados';

    protected $fillable = [
        'nombre', 'nive', 'codigo', 'prerequisito', 'descripcion', 'condicion'
    ];
}
