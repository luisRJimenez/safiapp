<?php

namespace App\Http\Livewire\Empresa;

use App\Models\departamento;
use App\Models\empresa;
use App\Models\municipio;
use Livewire\WithPagination;
use Livewire\Component;

class CrudEmpresa extends Component
{

    use WithPagination;


    public $buscar;


    public function render()
    {
        //dd($this->municipios);

        $datos = empresa::where('empnombre', 'like', '%'. $this->buscar .'%')
                        ->orWhere('empdireccion', 'like', '%'. $this->buscar .'%')
                        ->orderBy('empnombre')
                        ->paginate(5);

        return view('livewire.empresa.crud-empresa',[

            'departamento'=> departamento::all(),
            'municipio'=> municipio::all(),
            // 'muni' => $this->municipios->first(),
            'data' => $datos,
            ]);
    }

    public function getMunicipiosProperty()
    {
        // $empresamunicipio = municipio::select('*')
        //                             ->Join('empresas', 'empresas.departamento_id', 'municipios.dto_id')
        //                             ->Join('municipios as muni', 'empresas.municipio_id', 'muni.muncodigo' )
        //                             ->get();

        // return $empresamunicipio;
    }


}
