<?php

namespace App\Http\Livewire\Empresa;

use App\Models\departamento;
use App\Models\empresa;
use App\Models\municipio;
use Livewire\Component;

class AdicionarEmpresa extends Component
{

    public $selecteddto, $selectedmunicipio, $empnombre, $empdireccion, $emptelefono;
    public $municipios;
    public $open = false;

    public $empresa;


    public function mount(empresa $empresa){
        $this->empresa = $empresa;
    }

    public function render()
    {
        return view('livewire.empresa.adicionar-empresa', [
            'departamento' => departamento::all(),
            'municipio' => $this->municipios,
            'data' => $this->empresa

            ]);
    }


    protected $rules = [
        'selecteddto' => 'required',
        'selectedmunicipio' => 'required',
        'empnombre' => 'required',
        'empdireccion' => 'required',
        'emptelefono' => 'required'

    ];

    public function salvar() {
        $this->validate();

        empresa::create([
            'empnombre' => $this->empnombre,
            'empdireccion' => $this->empdireccion,
            'emptelefono' => $this->emptelefono,
            'departamento_id' => $this->selecteddto,
            'municipio_id' => $this->selectedmunicipio,
            'municipio_cod' => municipio::where('id', $this->selectedmunicipio)->pluck('muncodigo')->first(),
            'empestado' => 1
        ]);


        $this->mensaje = "Se creo la empresa $this->empnombre " ;


        $this->emit('alert', $this->mensaje);

        $this->reset(['empnombre', 'empdireccion', 'emptelefono', 'selectedmunicipio', 'selecteddto', 'open']);
    }


    public function updatedSelecteddto($dto_id){

        $depart = departamento::find($dto_id);

        if (isset($depart)){

            $this->municipios = $depart->municipios;
        } else {
            $this->selectedmunicipio=null;
            $this->municipios = null;
        };

    }
}
