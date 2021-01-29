<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaAcreditado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_programas_acreditados';

    protected $fillable = ['nues', 'nombre_programa','fecha_inicio_acreditacion', 'fecha_fin_acreditacion','estado'];
}
