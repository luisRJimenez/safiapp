<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPapeleria extends Model
{
    use HasFactory;

    protected $fillable = [
        'tpadescripcion', 'tpaestado',
    ];

    public function papelerias() {
        return $this->hasMany(papelerias::class);
    }
}
