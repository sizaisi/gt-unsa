<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_grados';

    protected $fillable = ['nombre', 'nive', 'codigo', 'prerequisito'];
}
