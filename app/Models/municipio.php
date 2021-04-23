<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;



    public function empresas() {
        return $this->hasMany(empresas::class);
    }

    public function departamento() {
        return $this->belongsTo(departamento::class, 'departamento_id', 'id');
    }


}
