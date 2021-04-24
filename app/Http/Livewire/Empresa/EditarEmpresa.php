<?php

namespace App\Http\Livewire\Empresa;

use App\Models\departamento;
use App\Models\empresa;
use App\Models\municipio;
use Livewire\Component;

class EditarEmpresa extends Component
{

    public $selecteddto, $selectedmunicipio, $empnombre, $empdireccion, $emptelefono;
    public $municipios;
    public $empresas;
    public $open = false;

    public function mount(empresa $empresas){
        $this->empresas = $empresas;

       $this->selecteddto = $this->empresas->departamento_id;
       $this->selectedmunicipio = $this->empresas->municipio_id;
       $this->municipios = departamento::find($this->empresas->departamento_id)->municipios;
    }

    protected $rules = [
        'empresas.selecteddto' => 'required',
        'empresas.selectedmunicipio' => 'required',
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

    public function updatedSelecteddto($dto_id){

        $depart = departamento::find($dto_id);

        if (isset($depart)){

            $this->municipios = $depart->municipios;
        }


    }
}
