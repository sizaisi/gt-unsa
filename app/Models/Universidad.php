<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_universidades';

    protected $fillable = ['cod_universidad', 'razon_social','estado'];
}
