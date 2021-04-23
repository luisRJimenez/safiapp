<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'empnombre', 'empdireccion', 'emptelefono', 'empestado', 'municipio_id', 'departamento_id', 'municipio_cod', 'empestado'
    ];

    public function municipio() {
        return $this->belongsTo(municipio::class, 'municipio_id', 'id');
    }



}
