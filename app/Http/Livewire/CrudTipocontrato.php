<?php

namespace App\Http\Livewire;

use App\Models\tipocontrato;
use Livewire\Component;

class CrudTipocontrato extends Component
{


    public $tpcdescripcion, $tpcestado, $selected_id;

    public $updateMode = false;

    public $data = [];

    public function render()
    {
        $this->data = tipocontrato::all();
        return view('livewire.crud-tipocontrato');
    }


    private function resetInput()
    {
        $this->tpcdescripcion = null;

    }

    protected $rules = [
        'tpcdescripcion' => 'required'
    ];

    public function salvar(){
        $this->validate();
        tipocontrato::create([
            'tpcdescripcion' => $this->tpcdescripcion,
            'tpcestado'=> 1,
            'tpcgrabo' => 'luisrodrigo',
            'tpcmodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = tipocontrato::findOrFail($id);
         $this->selected_id = $id;
         $this->tpcdescripcion = $record->tpcdescripcion;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = tipocontrato::find($this->selected_id);
            $record->update([
                'tpcdescripcion' => $this->tpcdescripcion,
                'tpcestado'=> 1,
                'tpcgrabo' => 'luisrodrigo',
                'tpcmodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = tipocontrato::findOrFail($id);

            $cambioestado = $record->tpcestado;


            $record->update([
                'tpcestado' => !$cambioestado,
                'tpcgrabo' => 'luisrodrigo',
                'tpcmodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = tipocontrato::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
