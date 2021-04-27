<?php

namespace App\Http\Livewire\Tipopago;

use App\Models\tipocontrato;
use App\Models\tipoPago;
use App\Models\tipoPlan;
use Livewire\Component;

class EditarTipopago extends Component
{


    public $tppdescripcion,  $tppvalor, $tppnumafiliados, $tppnumcarnes, $tpppagacomision;
    public $tipocontrato_id, $tipo_plans_id;
    public $tipocontrato;
    public $tipoplan;
    public $tipopagos;
    public $open = false;

    public function mount(tipoPago $tipopagos){
        $this->tipopagos = $tipopagos;

        $this->tipocontrato = $this->tipopagos->tipocontrato_id;
        $this->tipoplan = $this->tipopagos->tipo_plans_id;
    }

    protected $rules = [

        'tipopagos.tppdescripcion' => 'required',
        'tipopagos.tppvalor' => 'required',
        'tipopagos.tppnumafiliados' => 'required',
        'tipopagos.tppnumcarnes' => 'required',
        'tipopagos.tpppagacomision' => 'required',

        'tipopagos.tipocontrato_id' => 'required',
        'tipopagos.tipo_plans_id' => 'required'


    ];

    public function render()
    {


        return view('livewire.tipopago.editar-tipopago', [
            'tpcontrato' => tipocontrato::all(),
            'tpplan' => tipoPlan::all()


            ]);
    }

    public function actualizar(){
        $this->validate();



        $this->tipopagos->update([
                'tipopagos.tppdescripcion' => $this->tppdescripcion,
                'tipopagos.tppvalor' => $this->tppvalor,
                'tipopagos.tppnumafiliados' => $this->tppnumafiliados,
                'tipopagos.tppnumcarnes' => $this->tppnumcarnes,
                'tipopagos.tpppagacomision' => $this->tpppagacomision,
                'tipopagos.tipocontrato_id' => $this->tipocontrato_id,
                'tipopagos.tipo_plans_id' => $this->tipo_plans_id

        ]);

        $this->mensaje = "Se actualizo el tipo de afiliacion {$this->tipopagos->tppdescripcion} "  ;

        // dd($this->selectedpapestado);
        //$this->emit('actualizarpapeleria' , $this->selectedasesor, $this->selectedpapestado);
        $this->emit('alert', $this->mensaje);
        $this->emitTo('tipopago.crud-tipoafiliacion','render');

        $this->reset(['open']);

    }

    public function cancelar(){
        $this->reset(['open', 'tppdescripcion', 'tppvalor', 'tppnumafiliados', 'tppnumcarnes',
                        'tpppagacomision']);
    }


}
