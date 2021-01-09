<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColacionExpediente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_colacion_expedientes';

    protected $fillable = ['idcolacion', 'idexpediente'];
}
