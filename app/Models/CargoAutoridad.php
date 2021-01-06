<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CargoAutoridad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_cargo_autoridades';

    protected $fillable = ['idcargo', 'idautoridad', 'fecha_inicio', 'fecha_fin'];
}
