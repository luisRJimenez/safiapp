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
    public $operador;
    public $tipopagos;

    public $buscar;

    public function mount(tipoPago $tipopagos){
        $this->tipopagos = $tipopagos;
    }

    protected $listeners = ['render'];

    public function render()
    {
        // $this->operador = $this->tipopagos->where('tppdescripcion', 'like', '%'. $this->buscar .'%')
        //                                   ->paginate(10);

       $datos =  $this->tipopagoss;

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

        $this->mensaje = "Se elimino el plan ${nomtipopago} " ;

        $this->emit('alert', $this->mensaje);
    }


    public function updatedBuscar(){
        $this->resetPage();
    }

    public function updatedBuscarinactivos(){
        $this->reset(['buscar']);
    }

    public function getTipopagossProperty(){

        if ($this->buscarinactivos) {

            return tipoPago::where('tppdescripcion', 'like', '%'. $this->buscar .'%')
            ->where('tppestado', false)
            ->withTrashed()
            ->paginate(10);
        } else {
            return tipoPago::where('tppdescripcion', 'like', '%'. $this->buscar .'%')
            ->where('tppestado', true)
            ->paginate(10);

        }

    }
}
