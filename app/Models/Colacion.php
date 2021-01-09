<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_colaciones';

    protected $fillable = ['fecha', 'horainicio', 'horafin', 'cantidad', 'maximo'];
}