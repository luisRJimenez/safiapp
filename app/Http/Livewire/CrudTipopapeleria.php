<?php

namespace App\Http\Livewire;

use App\Models\tipoPapeleria;
use Livewire\Component;

class CrudTipopapeleria extends Component
{
    public $tpadescripcion, $tpaestado, $selected_id;

    public $updateMode = false;

    public $data = [];

    public function render()
    {
        $this->data = tipoPapeleria::all();
        return view('livewire.crud-tipopapeleria');
    }


    private function resetInput()
    {
        $this->tpadescripcion = null;

    }

    protected $rules = [
        'tpadescripcion' => 'required'
    ];

    public function salvar(){
        $this->validate();
        tipoPapeleria::create([
            'tpadescripcion' => $this->tpadescripcion,
            'tpaestado'=> 1,
            'tpagrabo' => 'luisrodrigo',
            'tpamodif' => 'luisrodrigo'
        ]);

        $this->resetInput();

     }

     public function edit($id)
     {
         $record = tipoPapeleria::findOrFail($id);
         $this->selected_id = $id;
         $this->tpadescripcion = $record->tpadescripcion;

         $this->updateMode = true;
     }

     public function update()
    {

        if ($this->selected_id) {
            $record = tipoPapeleria::find($this->selected_id);
            $record->update([
                'tpadescripcion' => $this->tpadescripcion,
                'tpaestado'=> 1,
                'tpagrabo' => 'luisrodrigo',
                'tpamodif' => 'luisrodrigo'
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function estado($id)
    {

        if ($id) {
            $record = tipoPapeleria::findOrFail($id);

            $cambioestado = $record->tpaestado;


            $record->update([
                'tpaestado' => !$cambioestado,
                'tpagrabo' => 'luisrodrigo',
                'tpamodif' => 'luisrodrigo'
            ]);

        }
        $this->resetInput();
        $this->updateMode = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = tipoPapeleria::where('id', $id);
            $record->delete();
        }
        $this->resetInput();
        $this->updateMode = false;
    }
}
