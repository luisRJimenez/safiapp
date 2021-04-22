<?php

namespace App\Http\Livewire;

use App\Models\papeleria;
use App\Models\tipoPapeleria;
use App\Models\User;
use Livewire\Component;

class AsignarPapeleria extends Component
{

    public $papnumeroini, $papnumerofin, $papestado, $selected_id, $selectedtipopapeleria, $selectedasesor, $mensaje;

    public $open = false;

    public function render()
    {
        $this->data = papeleria::all();
        return view('livewire.asignar-papeleria',[
            'tipos' => tipoPapeleria::all(),
            'users' => User::all()
        ]);

    }

    protected $rules = [
        'selectedasesor' => 'required',
        'selectedtipopapeleria' => 'required',
        'papnumeroini' => 'unique:App\Models\papeleria,papnumero|required|min:6|max:6',
        'papnumerofin' => 'unique:App\Models\papeleria,papnumero|required|min:6|max:6|required_if:papnumerofin,>,papnumeroini'

    ];

    public function updated($field)
{
    $this->validateOnly($field, [
        'selectedasesor' => 'required',
        'selectedtipopapeleria' => 'required',
        'papnumeroini' => 'unique:App\Models\papeleria,papnumero|required|min:6|max:6',
        'papnumerofin' => 'unique:App\Models\papeleria,papnumero|required|numeric|min:111111|max:399999'
    ]);
}

    public function salvar(){

        $this->validate();



        for ($i=$this->papnumeroini; $i <= $this->papnumerofin ; $i++) {
            # code...

            papeleria::create([
                'tipo_papeleria_id' => $this->selectedtipopapeleria,
                'papestado'=> 'asignado',
                'User_id' => $this->selectedasesor,
                'papnumero' => $i
            ]);
        }

        $asesor = User::where("id", $this->selectedasesor)->first();
        $papeleria = tipoPapeleria::where('id', $this->selectedtipopapeleria)->first();
        $numcontratosasignados = $this->papnumerofin - $this->papnumeroini + 1;
        $this->mensaje = "Se asignaron ${numcontratosasignados} $papeleria->tpadescripcion a  $asesor->name" ;



        $this->emit('alert', $this->mensaje);

        //dd($this->mensaje);

        $this->reset(['open', 'papnumeroini', 'papnumerofin', 'selectedasesor', 'selectedtipopapeleria']);

    }

}
