<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class papeleria extends Model
{
    use HasFactory;


    protected $fillable = [ 'papnumero', 'papestado', 'tipo_papeleria_id', 'User_id'];

    public function tipoPapeleria() {
        return $this->belongsTo(tipoPapeleria::class, 'tipo_papeleria_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'User_id', 'id');
    }

    public function getDateForHumansAttribute(){
        return $this->created_at->format('d-m-Y');
    }




}
