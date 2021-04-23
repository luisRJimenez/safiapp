<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;

    protected $with = ['municipios'];

    public function municipios() {
        return $this->hasMany(municipio::class);
    }



}
