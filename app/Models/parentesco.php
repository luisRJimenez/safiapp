<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentesco extends Model
{
    use HasFactory;

    protected $table = 'parentesco';

    protected $fillable = [
        'pardescripcion', 'parestado', 'pargrabo',
        'parmodif',

    ];

    protected $hidden = [



    ];

}
