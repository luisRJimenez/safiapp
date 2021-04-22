<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ocupacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'ocudescripcion', 'ocuestado', 'ocugrabo',
        'ocumodif',

    ];
}
