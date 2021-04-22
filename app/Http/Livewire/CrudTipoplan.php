<?php

namespace App\Http\Livewire;

use App\Models\tipoPlan;
use Livewire\Component;

class CrudTipoplan extends Component
{

    public $tpldescripcion, $tplestado, $selected_id, $tplpuntoscontado, $tplpuntoscredito;

    public $updateMode = false;

    public $data = [];

    public function render()
    {
        $this->data = tipoPlan::all();
        return view('livewire.crud-tipoplan');
    }


    private function resetInput()
    {
        $this->tpldescripcion = null;
        $this->tplpuntoscontado = null;
        $this->tplpuntoscredito = null;
    }

    protected $rules = [
        'tpldescripcion'    => 'required',
        'tplpuntoscontado'  => 'required',
        'tplpuntoscredito'  => 'required',

    ];

    public function salvar(){
        $this->validate();
        tipoPlan::create([
            'tpldescripcion' => $this->tpldescripcion,
            'tplpuntoscontado' =>$this->tplpuntoscontado,
            'tplpuntoscredito' =>$this->tplpuntoscredito,
            'tplestado'=> 1,
            'tplgrabo' => 'luisrodrigo',
            'tplmodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = tipoPlan::findOrFail($id);
         $this->selected_id = $id;
         $this->tpldescripcion = $record->tpldescripcion;
         $this->tplpuntoscontado = $record->tplpuntoscontado;
         $this->tplpuntoscredito = $record->tplpuntoscredito;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = tipoPlan::find($this->selected_id);
            $record->update([
                'tpldescripcion' => $this->tpldescripcion,
                'tplpuntoscontado' =>$this->tplpuntoscontado,
                'tplpuntoscredito' =>$this->tplpuntoscredito,
                'tplestado'=> 1,
                'tplgrabo' => 'luisrodrigo',
                'tplmodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = tipoPlan::findOrFail($id);

            $cambioestado = $record->tplestado;


            $record->update([
                'tplestado' => !$cambioestado,
                'tplgrabo' => 'luisrodrigo',
                'tplmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = tipoPlan::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
