<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradoModalidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_grados_modalidades';

    protected $fillable = ['idgrado', 'idmodalidad', 'condicion'];
}
