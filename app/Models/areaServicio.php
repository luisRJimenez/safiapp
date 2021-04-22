<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaServicio extends Model
{
    use HasFactory;

    public function especialidades() {
        return $this->hasMany(especialidad::class);
    }
}
