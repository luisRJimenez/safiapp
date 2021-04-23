<?php

namespace App\Http\Livewire\Empresa;

use App\Models\departamento;
use App\Models\empresa;
use Livewire\Component;

class EditarEmpresa extends Component
{

    public $selecteddto, $selectedmunicipio, $empnombre, $empdireccion, $emptelefono;
    public $municipios;
    public $open = false;

    public function render()
    {
        return view('livewire.empresa.editar-empresa', [
            'departamento' => departamento::all(),
            'municipio' => $this->municipios,
            'data' => empresa::all()

            ]);
    }
}
