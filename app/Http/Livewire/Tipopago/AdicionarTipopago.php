<?php

namespace App\Http\Livewire\Tipopago;

use App\Models\tipocontrato;
use App\Models\tipoPago;
use App\Models\tipoPlan;
use Livewire\Component;

class AdicionarTipopago extends Component
{


    public $tppdescripcion, $tppvalor, $tppnumafiliados, $tppnumcarnes, $tpppagacomision;
    public $tipocontrato, $tipoplan;
    public $open = false;

    public $tipopago;


    public function mount(tipoPago $tipopago){
        $this->tipopago = $tipopago;
    }



    public function render()
    {
        return view('livewire.tipopago.adicionar-tipopago', [
            'tpcontrato' => tipocontrato::all(),
            'tpplan' => tipoPlan::all(),
            'data' => $this->tipopago

            ]);
    }


    protected $rules = [
        'tipocontrato'      => 'required',
        'tipoplan'          => 'required',
        'tppdescripcion'    => 'required',
        'tppvalor'          => 'required',
        'tppnumafiliados'   => 'required',
        'tppnumcarnes'      => 'required',
        'tpppagacomision'   => 'required'

    ];

    public function salvar() {
        $this->validate();

        tipoPago::create([
            'tipocontrato_id' => $this->tipocontrato,
            'tipo_plans_id' => $this->tipoplan,
            'tppdescripcion' => $this->tppdescripcion,
            'tppvalor' => $this->tppvalor,
            'tppnumafiliados' => $this->tppnumafiliados,
            'tppnumcarnes' => $this->tppnumcarnes,
            'tpppagacomision' => $this->tpppagacomision,
            'tppestado' => 1,
            'tppgrabo' => 'luisrodrigo',
            'tppmodif' => 'luisrodrigo'
        ]);

        $this->mensaje = "Se creo la empresa $this->tppdescripcion " ;
        $this->emit('alert', $this->mensaje);
        $this->emitTo('tipopago.crud-tipoafiliacion','render');
        $this->reset(['tipocontrato', 'tipoplan', 'tppdescripcion', 'tppvalor', 'tppnumafiliados',
                        'tppnumcarnes', 'tpppagacomision', 'open']);
    }


    public function cancelar(){
        $this->reset(['tipocontrato', 'tipoplan', 'tppdescripcion', 'tppvalor', 'tppnumafiliados',
                        'tppnumcarnes', 'tpppagacomision', 'open']);

    }
}
