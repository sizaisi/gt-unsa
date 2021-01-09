<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expediente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_expediente';

    protected $fillable = ['nues', 'espe', 'codigo', 'titulo', 'url_repo', 'fecha_sesion_jurado', 'fecha_sustentacion', 'hora_sustentacion', 'fecha', 'estado', 'fing', 'fact'];
}
