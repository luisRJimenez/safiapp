<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPlan extends Model
{
    use HasFactory;

    protected $fillable = ['tpldescripcion', 'tplpuntoscontado', 'tplpuntoscredito', 'tplestado'];
}
