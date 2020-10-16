<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaEstudio extends Model
{
    use HasFactory;

    protected $table = 'gt_programas_estudio';

    protected $fillable = [
        'nombre', 'condicion'
    ];
}
