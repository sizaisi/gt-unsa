<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoModalidad extends Model
{
    use HasFactory;

    protected $table = 'gt_grados_modalidades';

    protected $fillable = [
        'tipo', 'idgrado', 'idmodalidad', 'condicion'
    ];
}
