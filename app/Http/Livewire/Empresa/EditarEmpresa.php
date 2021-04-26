<?php

namespace App\Http\Livewire\Empresa;

use App\Models\departamento;
use App\Models\empresa;
use App\Models\municipio;
use Livewire\Component;

class EditarEmpresa extends Component
{

    public $departamentoid, $municipio_id, $empnombre, $empdireccion, $emptelefono;
    public $municipios;
    public $empresas;
    public $open = false;

    public function mount(empresa $empresas){
        $this->empresas = $empresas;


      // $this->municipio_id = $this->empresas->municipio_id;
       $this->departamentoid = municipio::find($this->empresas->municipio_id)->departamento->id;
       $this->municipios = departamento::find(municipio::find($this->empresas->municipio_id)->departamento->id)->municipios;
    }

    protected $rules = [

        'departamentoid' => 'required',
        'empresas.municipio_id' => 'required',
        'empresas.empnombre' => 'required',
        'empresas.empdireccion' => 'required',
        'empresas.emptelefono' => 'required'

    ];

    public function render()
    {


        return view('livewire.empresa.editar-empresa', [
            'departamento' => departamento::all(),
            'municipio' => $this->municipios

            ]);
    }

    public function actualizar(){
        $this->validate();



        $this->empresas->update([
                'empresas.empnombre' => $this->empnombre,
                'empresas.empdireccion' => $this->empdireccion,
                'empresas.emptelefono' => $this->emptelefono,

                'empresas.municipio_id' => $this->municipio_id,
                'empresas.municipio_cod' => municipio::where('id', $this->municipio_id)->pluck('muncodigo')->first(),

        ]);

        $this->mensaje = "Se actualizo la empresa {$this->empresas->empnombre} "  ;

        // dd($this->selectedpapestado);
        //$this->emit('actualizarpapeleria' , $this->selectedasesor, $this->selectedpapestado);
        $this->emit('alert', $this->mensaje);

        $this->reset(['open']);

    }

    public function updatedDepartamentoid($dto_id){

        $depart = departamento::find($dto_id);

        if (isset($depart)){

            $this->municipios = $depart->municipios;
        }


    }
}
