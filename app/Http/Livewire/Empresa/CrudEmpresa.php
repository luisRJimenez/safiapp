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

    public $empresas;
    public $buscar;

    public function mount(empresa $empresas){
        $this->empresas = $empresas;

    }

    public function render()
    {
        $datos =  $this->empresas->where('empnombre', 'like', '%'. $this->buscar .'%')
                        ->orWhere('empdireccion', 'like', '%'. $this->buscar .'%')
                        ->orderBy('empnombre')
                        ->paginate(5);

        return view('livewire.empresa.crud-empresa',[
            //'departamento'=> departamento::all(),
            'municipio'=> municipio::all(),
            'data' => $datos
            ]);
    }

    public function estado($id)
    {

        if ($id) {
            $record = empresa::findOrFail($id);
            $nombreemp = $record->empnombre;
            $record->update([
                'empestado' => 0,
                'empgrabo' => 'luisrodrigo',
                'empmodif' => 'luisrodrigo'
            ]);

            $record->delete();
        }

        $this->mensaje = "Se elimino la empresa ${nombreemp} " ;


        $this->emit('alert', $this->mensaje);
    }




}
