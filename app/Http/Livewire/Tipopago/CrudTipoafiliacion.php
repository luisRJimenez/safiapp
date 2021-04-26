<?php

namespace App\Http\Livewire\Tipopago;

use App\Models\tipoPago;
use App\Models\tipoPlan;
use Livewire\WithPagination;
use Livewire\Component;

class CrudTipoafiliacion extends Component
{


    use WithPagination;

    public $buscarinactivos = false;
    public $tipopagos;
    public $buscar;

    public function mount(tipoPago $tipopagos){
        $this->tipopagos = $tipopagos;

    }

    public function render()
    {
        $datos =  $this->tipopagos->where('tppdescripcion', 'like', '%'. $this->buscar .'%')
                        ->where('tppestado', !$this->buscarinactivos)
                        ->paginate(10);

        return view('livewire.tipopago.crud-tipoafiliacion',[


            'data' => $datos
            ]);
    }

    public function estado($id)
    {

        if ($id) {
            $record = tipoPago::findOrFail($id);
            $nomtipopago = $record->tppdescripcion;
            $record->update([
                'tppestado' => 0,
                'tppgrabo' => 'luisrodrigo',
                'tppmodif' => 'luisrodrigo'
            ]);

            $record->delete();
        }

        $this->mensaje = "Se elimino la empresa ${nomtipopago} " ;


        $this->emit('alert', $this->mensaje);
    }


    public function updatedBuscar(){

        $this->resetPage();
    }

    public function updatedBuscarinactivos(){
        $this->buscarinactivos;
    }
}
