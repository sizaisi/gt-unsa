<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denominacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_denominaciones';

    protected $fillable = ['nues', 'den_m','den_f','estado'];
}
