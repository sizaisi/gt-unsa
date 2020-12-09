<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    use HasFactory;

    protected $table = 'gt_procedimientos';

    protected $fillable = [
        'nombre', 'condicion'
    ];
}
