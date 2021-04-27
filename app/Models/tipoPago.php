<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipoPago extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [ 'tppdescripcion', 'tppvalor', 'tppnumafiliados',
                            'tppnumcarnes', 'tpppagacomision', 'tipo_plans_id', 'tipocontrato_id', 
                            'tppestado'];

    public function tipoPlan() {
        return $this->belongsTo(tipoPlan::class, 'tipo_plans_id', 'id');
    }

    public function tipocontrato() {
        return $this->belongsTo(tipocontrato::class, 'tipocontrato_id', 'id');
    }

}
