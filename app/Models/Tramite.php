<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tramite extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_tramites';

    protected $fillable = ['nombre', 'codigo', 'componente'];
}
