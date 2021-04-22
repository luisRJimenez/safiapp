<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoAsesor extends Model
{
    use HasFactory;

    protected $table = 'tipo_asesores';

    protected $fillable = [
        'tasdescripcion', 'tasestado',
    ];

}
