<?php

namespace App\Http\Livewire;

use App\Models\papeleria;
use App\Models\tipoPapeleria;
use App\Models\User;
use Livewire\Component;

class ActualizarPapeleria extends Component
{

    public $papestado, $selectedasesor, $mensaje, $selectedpapestado;

    public $open = false;

    public $estados = [
        'anulado',
        'asignado',
        'reportado'
    ];

    public function render()
    {


        return view('livewire.actualizar-papeleria', [

            'users' => User::all(),
            'estados' => $this->estados

        ]);
    }

    protected $rules = [
        'selectedasesor' => 'required',
        'selectedpapestado' => 'required'


    ];


    public function reasignar(){
        $this->validate();



        $asesor = User::where("id", $this->selectedasesor)->first();

        $this->mensaje = "Se reasignaron a  $asesor->name" ;

       // dd($this->selectedpapestado);
        $this->emit('actualizarpapeleria' , $this->selectedasesor, $this->selectedpapestado);
        $this->emit('alert', $this->mensaje);

        $this->reset(['open',  'selectedasesor',  'selectedpapestado']);

    }
}


