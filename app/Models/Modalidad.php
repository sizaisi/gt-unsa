<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modalidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gt_modalidades';

    protected $fillable = ['nombre'];
}
