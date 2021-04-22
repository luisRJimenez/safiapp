<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupoAsesor extends Model
{
    use HasFactory;

    protected $table = 'grupo_asesores';

    protected $fillable = ['gasdescripcion', 'gasestado'];


}
