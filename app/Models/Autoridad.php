<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    use HasFactory;

    protected $table = 'gt_autoridades';

    protected $fillable = [
        'nombre', 'grado', 'condicion'
    ];
}
