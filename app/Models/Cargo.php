<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'gt_cargos';

    protected $fillable = [
        'codigo', 'nombre', 'condicion'
    ];
}
