<?php

namespace App\Http\Livewire;

use App\Models\tipoPapeleria;
use App\Models\papeleria;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CrudPapeleria extends Component
{
     use WithPagination;

    public $fechaIni, $fechaFin, $papestado,  $selectedtipopapeleria, $selectedasesor, $selectedpapestado;

    public $updateMode = false;
    public $papnumero;
    public $selectedId = [];
    public $selectedAll = false;



    //public $search = 'esto se buscara';

    public function render()
    {
        $datos = $this->Papelerias;

        return view('livewire.crud-papeleria',[
            'datos' => $datos,
            'tipos' => tipoPapeleria::all(),
            'users' => User::all(),

        ]);
    }

    public function borrarbusquedas() {
        $this->reset('papnumero', 'selectedasesor', 'selectedpapestado', 'selectedtipopapeleria', 'fechaFin',
        'fechaIni', 'selectedId', 'selectedAll');
        $this->resetPage();
    }

    // public function buscar(){


    //     $this->datos = papeleria::when($this->papnumero == 0, function($q){

    //         return $q ->Where('User_id', '=', $this->selectedasesor)
    //         ->where('tipo_papeleria_id', '=', $this->selectedtipopapeleria)
    //         ->whereBetween('created_at', [ $this->fechaIni." 00:00:00",  $this->fechaFin." 23:59:59"]);
    //     },
    //     function($q)
    //     {return $q -> Where('papnumero', '=', $this->papnumero);} )
    //                             ->get();

    //     $this->reset('papnumero');
    //     return view('livewire.crud-papeleria', ['user' => User::all()])->with('datos');


    // }

    public function updatedSelectedAll($value){

        if($value){
            $this->selectedId = $this->Papelerias->pluck('id')->map(fn($item)=>(string)$item);
        }
        else
        {
            $this->selectedId = [];
        }

    }

    public function updatedSelectedId($value){
        if (count($value) > 8 ){

            $this->selectedAll = false;
            $this->selectedId = [];
        }
        if (count($value) < 8) {
            $this->selectedAll = false;
        }
        if (count($value) == 8) {
            $this->selectedAll = true;
        }

    }

    public function updatedPapnumero(){
        $this->resetPage();
    }

    public function updatedSelectedasesor(){
        $this->selectedAll = false;
        $this->selectedId = [];
        $this->resetPage();
    }

    public function updatedSelectedtipopapeleria(){
        $this->selectedAll = false;
        $this->selectedId = [];
    }

    public function updatedSelectedpapestado(){
        $this->selectedAll = false;
        $this->selectedId = [];
    }

    public function updatedFechaIni(){
        $this->selectedAll = false;
        $this->selectedId = [];
    }

    public function updatedFechaFin(){
        $this->selectedAll = false;
    }

    public function getPapeleriasProperty(){

        return papeleria::where('papnumero', '=', $this->papnumero)
                        ->orWhere('User_id', '=', $this->selectedasesor)
                        ->where('tipo_papeleria_id', '=', $this->selectedtipopapeleria)
                        ->where('papestado', '=', $this->selectedpapestado)
                        ->whereBetween('created_at', [ $this->fechaIni." 00:00:00",  $this->fechaFin." 23:59:59"])
                        ->paginate(8);
    }

    public function borrarpapeleria(){
    // dd($this->selectedId);
        papeleria::destroy($this->selectedId);

        $this->selectedAll = false;
        $this->selectedId = [];
    }

    protected $listeners = ['actualizarpapeleria'];

    public function actualizarpapeleria($asesor, $estado){

        $data = [
            'User_id' => $asesor,
            'papestado' => $estado

        ];
        papeleria::whereIn('id', $this->selectedId)->update($data);
        $this->selectedAll = false;
        $this->selectedId = [];

    }




}
