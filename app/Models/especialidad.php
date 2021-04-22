<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'tsdescripcion', 'tsestado', 'tsgrabo', 'area_servicios_id',
        'tsmodif',

    ];

    public function areaServicio() {
        return $this->belongsTo(areaServicio::class, 'area_servicios_id', 'id');
    }
}
